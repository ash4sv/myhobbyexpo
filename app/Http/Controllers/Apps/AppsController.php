<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Mail\SendConfirmationMHXCupEmail;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\MHXCup\RacerRegister;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\Section;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AppsController extends Controller
{
    private string $view = 'apps.preregister.';

    public function login()
    {
        return view('apps.login');
    }

    public function dashboard()
    {
        $this->authorize('dashboard-access');

        $dailyCounts = PreRegistration::selectRaw('DATE(created_at) as date, COUNT(*) as count')->groupBy('date')->get();

        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();
        $sponsors = PreRegistration::Where('become_sponsors', '=', 1)->get();

        $section = Section::all();

        return view('apps.index', [
            'selling_vendor' => $selling_vendor,
            'hobby_activity' => $hobby_activity,
            'hobby_showoff'  => $hobby_showoff,
            'sponsors'       => $sponsors,
            'dailyCounts'    => $dailyCounts,
            'zones'          => $section
        ]);
    }

    public function sellingVendor()
    {
        $this->authorize('pre-register-access', 'selling-vendor');
        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $selling_vendor,
            'title' => 'Selling Vendor',
        ]);
    }
    public function hobbyActivity()
    {
        $this->authorize('pre-register-access', 'hobby-showoff');
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $hobby_activity,
            'title' => 'Hobby Activity',
        ]);
    }
    public function hobbyShowoff()
    {
        $this->authorize('pre-register-access', 'hobby-activity');
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $hobby_showoff,
            'title' => 'Hobby Show-off',
        ]);
    }

    public function sponsorship()
    {
        $sponsorships = PreRegistration::where('become_sponsors', '=', 1)->get();

        return view($this->view.'index', [
            'registers' => $sponsorships,
            'title' => 'Hobby Show-off',
        ]);
    }

    public function routeList()
    {
        $this->authorize('route-access');
        return view('apps.route.index', [
            'routes' => Route::getRoutes()
        ]);
    }

    public function batchStore(Request $request)
    {
        $request->validate([
            'zone'  => 'required',
            'prefix' => 'required|string',
            'start' => 'required|numeric',
            'end'   => 'required|numeric',
        ]);

        for ($i = $request->start; $i <= $request->end; $i++) {
            $numbers[] = [
                'section_id'   => $request->zone,
                'booth_number' => $request->prefix . str_pad($i, 2, '0', STR_PAD_LEFT), // This will generate MH01, MH02, ..., MH16
                'description'  => null,
                'status'       => false,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }
        BoothNumber::insert($numbers);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->back();
    }

    public function batchboothNumberDelete(Request $request)
    {
        $id = $request->id;
        BoothNumber::whereIn('id', $id)->delete();
        return response()->json(['success' => 'Record has been deleted successfully']);
    }

    public function batchboothEdit(Request $request)
    {
        $boothIds = $request->input('id');
        // Ensure $boothIds is an array
        if (!is_array($boothIds)) {
            $boothIds = [$boothIds];
        }
        // Fetch the selected booths
        $booths = BoothNumber::whereIn('id', $boothIds)->get();
        $zones  = DB::table('sections')->pluck('name', 'id');
        return view('apps.exhibition.booth-number.edit-batch', compact('booths'), compact('zones'));
    }

    public function batchboothUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booth_numbers' => 'required|array',
            'zone' => 'required|array',
            'description' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $boothNumbers = $request->input('booth_numbers');
        $boothIds = $request->input('id');
        $zone = $request->input('zone');
        $description = $request->input('description');

        foreach ($boothIds as $key => $boothId) {
            $booth = BoothNumber::find($boothId);
            $booth->booth_number = $boothNumbers[$key];
            $booth->section_id = $zone[$key];
            $booth->description = $description[$key];
            $booth->status = false; // Assuming you want to set status to false for all
            $booth->save();
        }

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route('apps.exhibition.booth-number.index');
    }

    public function debugBillplz(Request $request)
    {
        return view('apps.billplz.debug.form');
    }

    public function categoryCup(Request $request)
    {
        $categoryLoad = $request->input('category');
        $data = RacerRegister::with('numberRegister')->where('category', $categoryLoad)->get();
        return response()->json($data);
    }

    public function approveRegister(Request $request)
    {
        $registered = RacerRegister::where('id', $request->id)->first();
        $pdfData = [
            'uniq'                      => $registered->uniq,
            'full_name'                 => $registered->full_name,
            'identification_card_number' => $registered->identification_card_number,
            'group'                     => $registered->team_group,
            'email'                     => $registered->email,
            'phone_number'              => $registered->phone_number,
            'create_date'               => $registered->created_at,
            'category'                  => $registered->category,
            'registration'              => $registered->registration,
            'price_category'            => $registered->price_category,
            'total_cost'                => $registered->total_cost,
            'runNum'                    => $registered->numberRegister,
            'nickname'                  => $registered->nickname,
        ];

        $customPaper = [0, 0, 595.28, 841.89];
        $pdf = PDF::loadView('front.mhxcup.receipt-mhxcup', $pdfData)->setPaper($customPaper, 'portrait')
            ->save(public_path('assets/upload/' . $registered->uniq.'_'.strtoupper($registered->nickname) . '.pdf'));

        $registered->update([
            'approval' => true
        ]);

        Mail::to($registered->email)->send(new SendConfirmationMHXCupEmail($pdfData));

        return response()->json([
            'status' => true,
            'title'  => 'Racer already approve!!',
            'msg'    => 'System will send the email to the racer',
        ]);
    }
}
