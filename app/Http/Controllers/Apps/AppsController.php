<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

    public function batchboothNumber(Request $request)
    {
        return $request->all();
    }

    public function batchboothNumberDelete(Request $request)
    {
        $id = $request->id;
        BoothNumber::whereIn('id', $id)->delete();
        return response()->json(['success' => 'Record has been deleted successfully']);
    }
}
