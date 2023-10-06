<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apps\Booth;
use App\Models\Apps\BoothExhibitionBooked;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\BoothType;
use App\Models\Apps\Hall;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\Section;
use App\Models\Apps\TypeOfInterest;
use App\Models\Apps\Vendor;
use App\Services\ImageUploader;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Billplz\Client;

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
        $request->validate([
            'booth_qty' => 'required',
            'booths'    => 'required',
        ]);
        $request->session()->put([
            'section_id'                    => $request->section_id,
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

            'sub_total'                     => $request->sub_total,
            'total'                         => $request->total,
            'booths'                        => $request->booths,
        ]);

        $sections = Section::all();

        return view('front.vendor', [
            'data'      => $request->all(),
            'subTotal'  => $request->sub_total,
            'total'     => $request->total,
            'sections'  => $sections
        ]);
    }

    public function vendorRegister(Request $request)
    {
        $dataPull = $request->session()->only([
            'section_id',
            'booth_qty',
            'booth_price',
            'booth_price_unit',
            'table_TPrice',
            'add_on_table',
            'add_table',
            'chair_TPrice',
            'add_on_chair',
            'add_chair',
            'sso_TPrice',
            'add_on_sso',
            'add_sso',
            'ssoamp15_TPrice',
            'add_on_sso_15amp',
            'add_sso_15amp',
            'steel_barricade_TPrice',
            'add_on_steel_barricade',
            'add_steel_barricade',
            'shell_scheme_barricade_TPrice',
            'add_on_shell_scheme_barricade',
            'add_shell_scheme_barricade',
            'sub_total',
            'booths'
        ]);

        $vendorData = [
            'subtotal_val'      => $request->subtotal_val,
            'add_on_table'      => $request->add_on_table,
            'total_val'         => $request->total_val,
            'company_name'      => $request->company_name,
            'roc_rob'           => $request->roc_rob,
            'person_in_charge'  => $request->person_in_charge,
            'contact_no'        => $request->contact_no,
            'email'             => $request->email,
            'facebook_page'     => $request->facebook_page,
            'instagram'         => $request->instagram,
            'tiktok'            => $request->tiktok,
            'other'             => $request->other,
            'website'           => $request->website,
            'sales_agent'       => $request->sales_agent,
        ];

        $socmed = json_encode([
            'facebook' => $request->facebook_page,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'other' => $request->other,
        ]);

        $addOn  = json_encode([
            [
                'item' => 'Chair',
                'qty'  => $dataPull['add_chair'],
                'unit' => $dataPull['chair_TPrice'],
            ],
            [
                'item' => 'Table',
                'qty'  => $dataPull['add_table'],
                'unit' => $dataPull['table_TPrice'],
            ],
            [
                'item' => 'SSO (13 amp)',
                'qty'  => $dataPull['add_sso'],
                'unit' => $dataPull['sso_TPrice'],
            ],
            [
                'item' => 'SSO (15 amp)',
                'qty'  => $dataPull['add_sso_15amp'],
                'unit' => $dataPull['ssoamp15_TPrice'],
            ],
            [
                'item' => 'Steel Barricade',
                'qty'  => $dataPull['add_steel_barricade'],
                'unit' => $dataPull['steel_barricade_TPrice'],
            ],
            [
                'item' => 'Shell Scheme Barricade',
                'qty'  => $dataPull['add_shell_scheme_barricade'],
                'unit' => $dataPull['shell_scheme_barricade_TPrice'],
            ],
        ]);

        $vendorPut = $request->validate([
            'company_name'      => 'required',
            'roc_rob'           => 'required',
            'person_in_charge'  => 'required',
            'contact_no'        => 'required',
            'email'             => 'required',
            'sales_agent'       => 'required',
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
            $image = ImageUploader::uploadSingleImage($request->file('image'), 'assets/upload', 'vendor');;
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

        $total_val = str_replace("RM ", "", $request->total_val);
        $total_val = 1.00;
        $amount = ($total_val * 100);
        $serviceFee = $total_val * 0.035;

        $shopRef = IdGenerator::generate(['table' => 'booth_exhibition_bookeds', 'field' => 'inv_number', 'length' => 15, 'prefix' => 'MHX-23-']);
        $booked                      = new BoothExhibitionBooked();
        $booked->inv_number          = $shopRef;
        $booked->inv_date            = date('Y-m-d');
        $booked->vendor_id           = $vendor->id;
        $booked->sales_agent_id      = $request->sales_agent;
        $booked->inv_description     = null;
        $booked->add_on              = $addOn;
        $booked->total               = $total_val;
        $booked->fee                 = $serviceFee;
        $booked->payment_status      = false;
        $booked->save();

        $request->session()->put([
            'vendor'            => $vendor,
            'booked'            => $booked,
            'booths'            => $dataPull['booths'],
            'booth_qty'         => $dataPull['booth_qty'],
            'booth_price'       => $dataPull['booth_price'],
            'booth_price_unit'  => $dataPull['booth_price_unit']
        ]);

        $billplz = Client::make(config('billplz.billplz_key'), config('billplz.billplz_signature'));
        if(config('billplz.billplz_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        $bill = $bill->create(
            config('billplz.billplz_collection_id'),
            $vendorData['email'],
            $vendorData['contact_no'],
            $vendorData['company_name'],
            \Duit\MYR::given($amount),
            route('front.webhook'),
            'Register of Vendor MHX2023' . $vendorData['company_name'] . ' ' . $vendorData['email'] . ' ' . $vendorData['company_name'] ,
            ['redirect_url' => route('front.billplzhandle')]
        );

        $cacheCheckout = Cache::put('checkoutdata', $vendorData, now()->addMinute(20));
        $vendorCache = Cache::put('vendor', $vendorPut, now()->addMinute(20));
        $shopReference = Cache::put('ref', $shopRef, now()->addMinute(20));
        $boothsData = Cache::put('booths', $dataPull["booths"], now()->addMinute(20));

        return redirect($bill->toArray()['url']);
    }

    public function billplzHandleRedirect(Request $request) {

        $vendor             = $request->session()->pull('vendor');
        $boothsPull         = $request->session()->pull('booths');
        $booth_qty          = $request->session()->pull('booth_qty');
        $booth_price        = $request->session()->pull('booth_price');
        $booth_price_unit   = $request->session()->pull('booth_price_unit');
        $bookedPull         = $request->session()->pull('booked');

        $vendor = Vendor::findOrFail($vendor['id']);
        $booths  = BoothNumber::where('vendor_id', $vendor->id)->get();

        $billplz = Client::make(config('billplz.billplz_key'), config('billplz.billplz_signature'));
        if(config('billplz.billplz_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        try {
            $bill = $bill->redirect($request->all());
        } catch(\Exception $e) {
            dd($e->getMessage());
        }
        $bill['data'] = $billplz->bill()->get($bill['id'])->toArray();

        if ($bill['data']['paid'] == 'true'){
            DB::table('billplz_status')->insert([
                'shopref' => $bookedPull['inv_number'],
                'billplz_id' => $bookedPull['id'],
                'billplz_paid' => $bill['data']['paid'],
                'billplz_paid_at' => $bill['data']['paid_at'],
                'billplz_x_signature' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Alert::success('Thank you for registration', 'We will send an email for your reference');
            return view('front.confimation-bill', [
                'bill'             => $bill,
                'vendor'           => $vendor,
                'booths'           => $booths,
                'booth_price'      => $booth_price,
                'booth_qty'        => $booth_qty,
                'booth_price_unit' => $booth_price_unit,
                'bookedPull'       => $bookedPull
            ]);
        } elseif ($bill['data']['paid'] == 'false'){
            Alert::warning('We are sorry', 'Your payment don\'t go through');
            return redirect()->route('front.register');
        }
        Alert::warning('We are sorry', 'Your payment don\'t go through');
        return redirect()->back();
    }

    public function webhook(Request $request)
    {
        $checkout = Cache::pull('checkoutdata');
        $vendor = Cache::pull('vendor');
        $ref = Cache::pull('ref');
        $booth = Cache::pull('booths');
        $data = $request->all();

        Log::info('Booth', $booth);
        Log::info('Checkout', $checkout);
        Log::info('Vendor', $vendor);

        Log::info('This webhook data');
        Log::info($data);
        Log::info('-------- webhook ' . date('Ymd/m/y H:i') . ' ---------');

        if ($data['paid'] == 'true') {
            $bookedData = BoothExhibitionBooked::where('inv_number', $ref)->first();
            $bookedData->update(['payment_status' => true]);

            DB::table('billplz_webhook')->insert([
                'shopref'       => $ref,
                'billplz_id'    => $data['id'],
                'collection_id' => $data['collection_id'],
                'paid'          => $data['paid'],
                'state'         => $data['state'],
                'amount'        => $data['amount'],
                'paid_amount'   => $data['paid_amount'],
                'due_at'        => $data['due_at'],
                'email'         => $data['email'],
                'mobile'        => $data['mobile'],
                'name'          => $data['name'],
                'url'           => $data['url'],
                'paid_at'       => $data['paid_at'],
                'x_signature'   => $data['x_signature'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        Log::info('Order successfully placed and the confirmation email has been sent to ');
        Log::info('=================');
    }
}
