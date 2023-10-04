<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apps\Booth;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\BoothType;
use App\Models\Apps\Hall;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\Section;
use App\Models\Apps\TypeOfInterest;
use App\Models\Apps\Vendor;
use App\Services\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function preRegister()
    {
        return view('front.pre-register');
    }

    public function preRegSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name_company' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_no' => 'required|string',
            'email' => 'required|email',
            'selection_in' => 'required|in:1,2,3',
            'bare_size' => '',
            'shell_scheme' => '',
            'basic_lot' => '',
            'anw_item_for_sale' => '',
            'anw_item_for_showoff' => '',
            'anw_activities_explain' => '',
            'anw_activities_pic' => 'array|max:6',
            'anw_activities_pic.*' => 'image|mimetypes:image/jpeg,image/png,image/jpg,image/gif|max:2048',
            'become_sponsors' => 'required',
        ]);

        $nameOfCompanyName = $request->name_company;
        $folderName = Str::slug($nameOfCompanyName);
        $uploadedImages = [];

        if ($request->hasFile('anw_activities_pic')) {
            $count = 1; // Initialize a counter for numbering files

            foreach ($request->file('anw_activities_pic') as $image) {
                $originalExtension = $image->getClientOriginalExtension(); // Get the original file extension
                $imageName = now()->format('YmdHis') . '_' . $count . '.' . $originalExtension; // Create the new filename

                $imagePath = "assets/upload/{$folderName}";

                $image->move($imagePath, $imageName);
                $uploadedImages[] = $imageName;

                $count++; // Increment the counter
            }
        }

        $jsonData = json_encode($uploadedImages);

        $preRegistration = new PreRegistration();
        $preRegistration->name_company = $nameOfCompanyName;
        $preRegistration->person_in_charge = $request->person_in_charge;
        $preRegistration->contact_no = $request->contact_no;
        $preRegistration->email = $request->email;
        $preRegistration->selection_in = $request->selection_in;
        $preRegistration->bare_size = json_encode([ 'length' => $request->bare_size[0], 'width' => $request->bare_size[1] ]);;
        $preRegistration->shell_scheme = $request->shell_scheme;
        $preRegistration->basic_lot = $request->basic_lot;
        $preRegistration->item_for_sale = $request->anw_item_for_sale;
        $preRegistration->item_for_showoff = $request->anw_item_for_showoff;
        $preRegistration->activity = $request->anw_activities_explain;
        $preRegistration->activity_pic = $jsonData;
        $preRegistration->become_sponsors = $request->become_sponsors;
        $preRegistration->save();

        Alert::success('Thank you for registration', 'We already received your registration');
        return redirect()->back();
    }

    public function register()
    {
        $halls = Hall::where('status', true)->get();

        return view('front.register', [
            'halls' => $halls
        ]);
    }

    public function getBoothNumbers(Request $request)
    {
        $currenttime = date("Y-m-d H:i:s",time());

        $boothTypeId = $request->input('boothTypes');
        $booth = Booth::findOrFail($boothTypeId);
        $availableNumbers = $booth->boothNumbers()->where('status', 0)->get();

        $priceDisplay = $booth->early_bird_price;
        if ($booth->early_bird_expiry_date < $currenttime){
            $priceDisplay = $booth->normal_price;
        }

        return response()->json([$availableNumbers, $priceDisplay]);
    }

    public function booth(Request $request)
    {
        /*return $request->all();*/

        $request->validate([
            'booths.id.*' => 'required'
        ]);
        $request->session()->put([
            'booth_type'                    => $request->booth_type,
            'booth_qty'                     => $request->booth_qty,
            'booth_price'                   => $request->booth_price,
            'booth_price_unit'              => $request->booth_price_unit,

            'table_TPrice'                  => $request->table_TPrice,
            'add_on_table'                  => $request->add_on_table,
            'add_table'                     => $request->add_table,
            'chair_TPrice'                  => $request->chair_TPrice,
            'add_on_chair'                  => $request->add_on_chair,
            'add_chair'                     => $request->add_chair,
            'sso_TPrice'                    => $request->sso_TPrice,
            'add_on_sso'                    => $request->add_on_sso,
            'add_sso'                       => $request->add_sso,
            'ssoamp15_TPrice'               => $request->ssoamp15_TPrice,
            'add_on_sso_15amp'              => $request->add_on_sso_15amp,
            'add_sso_15amp'                 => $request->add_sso_15amp,
            'steel_barricade_TPrice'        => $request->steel_barricade_TPrice,
            'add_on_steel_barricade'        => $request->add_on_steel_barricade,
            'add_steel_barricade'           => $request->add_steel_barricade,
            'shell_scheme_barricade_TPrice' => $request->shell_scheme_barricade_TPrice,
            'add_on_shell_scheme_barricade' => $request->add_on_shell_scheme_barricade,
            'add_shell_scheme_barricade'    => $request->add_shell_scheme_barricade,

            'sub_total'                     => $request->sub_total_push,
            'total'                         => $request->total_push,
            'booths'                        => $request->booths,
        ]);

        $sections = Section::all();

        return view('front.vendor', [
            'data'      => $request->all(),
            'subTotal'  => $request->sub_total_push,
            'total'     => $request->total_push,
            'sections'  => $sections
        ]);
    }

    public function vendorRegister(Request $request)
    {
        $dataPull = $request->session()->only([
            'booth_type',
            'booth_qty',
            'booth_price',
            'booth_price_unit',
            'table_TPrice',
            'add_table',
            'chair_TPrice',
            'add_chair',
            'sso_TPrice',
            'add_sso',
            'sub_total',
            'total',
            'booths',
            'sso_15amp',
            'steel_barricade',
            'shell_scheme_barricade',
        ]);

        $socmed = json_encode([
            'facebook' => $request->facebook_page,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'other' => $request->other,
        ]);

        $vendor = new Vendor();
        $vendor->company = $request->company_name;
        $vendor->roc_rob = $request->roc_rob;
        $vendor->pic_name = $request->person_in_charge;
        $vendor->phone_num = $request->contact_no;
        $vendor->email = $request->email;
        $vendor->social_media = $socmed;
        $vendor->website = $request->website;

        if ($request->hasFile('image')) {
            $image = ImageUploader::uploadSingleImage($request->file('image'), 'assets/images', 'vendor');;
        } else {
            $image = $vendor->image;
        }

        $vendor->image = $image;
        $vendor->save();

        foreach ($dataPull["booths"]["id"] as $id => $status) {
            if ($status === "on") {
                try {
                    $foundBooth = BoothNumber::findOrFail($id);
                    $foundBooth->update([
                        'vendor_id' => $vendor->id,
                        'status'    => true
                    ]);
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
                }
            }
        }

        Alert::success('Thank you for registration', 'We already received your registration');
        return redirect()->back();
    }

}
