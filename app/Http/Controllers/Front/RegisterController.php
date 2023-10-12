<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendConfirmationEmail;
use App\Models\Apps\Booth;
use App\Models\Apps\BoothExhibitionBooked;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Hall;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\SalesAgent;
use App\Models\Apps\Section;
use App\Models\Apps\Vendor;
use App\Services\ImageUploader;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Billplz\Client;
use PDF;

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
        /*$halls = Hall::where('status', true)->get();
        return view('front.register', [
            'halls'  => $halls,
            'full'    => true
        ]);*/
        return redirect(env('APP_URL'));
    }

    public function registerHall($hall)
    {
        $halls = Hall::where('slug', $hall)->get();
        return view('front.register', [
            'halls'  => $halls,
            'direct' => true
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

        $section = Section::where('id', $request->section_id)->first();
        $boothData = $request->booths;
        $boothIds = array_keys($boothData['id']);
        $boothNumbers = BoothNumber::whereIn('id', $boothIds)->get();

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

        return view('front.vendor' , [
            'section' => $section,
            'sections' => Section::all(),
            'data'     => $request->all(),
            'subTotal' => $request->sub_total,
            'total'    => $request->total,
            'booths'   => $boothNumbers
        ]);
    }

    public function vendorRegister(Request $request)
    {
        $vendorPut = $request->validate([
            'company_name'      => 'required',
            'roc_rob'           => 'required',
            'person_in_charge'  => 'required',
            'contact_no'        => 'required',
            'email'             => 'required',
            'sales_agent'       => 'required',
        ]);

        $dataPull = $request->session()->only([
            'section_id', 'booth_qty',
            'booth_price', 'booth_price_unit',
            'table_TPrice', 'add_on_table',
            'add_table', 'chair_TPrice', 'add_on_chair', 'add_chair', 'sso_TPrice', 'add_on_sso',
            'add_sso', 'ssoamp15_TPrice', 'add_on_sso_15amp', 'add_sso_15amp', 'steel_barricade_TPrice', 'add_on_steel_barricade', 'add_steel_barricade',
            'shell_scheme_barricade_TPrice',
            'add_on_shell_scheme_barricade',
            'add_shell_scheme_barricade',
            'sub_total', 'total', 'booths',
        ]);

        $vendorSubmitedData = [
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

        $socmed = json_encode(['facebook' => $request->facebook_page, 'instagram' => $request->instagram, 'tiktok' => $request->tiktok, 'other' => $request->other ]);

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

        $shopRef = IdGenerator::generate(['table' => 'booth_exhibition_bookeds', 'field' => 'inv_number', 'length' => 15, 'prefix' => 'MHX-23-']);
        $invDate = now();

        $total_val = str_replace("RM ", "", $request->total_val);
        /*$total_val = 2.00;*/
        $amount = ($total_val * 100);
        $serviceFee = $total_val * 0.035;

        $request->session()->put([
            'dataPull'         =>  $dataPull,
            'vendorSubmitData' => $vendorSubmitedData,
            'vendor'           => $vendor,
            'ref'              => $shopRef,
            'invDate'          => $invDate,
            'servicesFee'      => $serviceFee,
        ]);

        $passingData = [
            'dataPull'         => $dataPull,
            'vendorSubmitData' => $vendorSubmitedData,
            'vendor'           => $vendor,
            'ref'              => $shopRef,
            'invDate'          => $invDate,
            'servicesFee'      => $serviceFee,
        ];

        $passWebhook = Cache::put('WebHook', $passingData, now()->addMinute(20));

        $billplz = Client::make(config('billplz.billplz_key'), config('billplz.billplz_signature'));
        if(config('billplz.billplz_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        $bill = $bill->create(
            config('billplz.billplz_collection_id'),
            $vendorSubmitedData['email'],
            $vendorSubmitedData['contact_no'],
            $vendorSubmitedData['company_name'],
            \Duit\MYR::given($amount),
            route('front.webhook'),
            'Register of Vendor MHX2023',
            ['redirect_url' => route('front.redirect')]
        );

        return redirect($bill->toArray()['url']);
    }

    public function billplzHandleRedirect(Request $request)
    {
        $dataPull           = $request->session()->pull('dataPull');
        $vendorSubmitData   = $request->session()->pull('vendorSubmitData');
        $vendor             = $request->session()->pull('vendor');
        $ref                = $request->session()->pull('ref');
        $invDate            = $request->session()->pull('invDate');
        $agent              = SalesAgent::findOrFail($vendorSubmitData['sales_agent']);

        $boothIds = collect($dataPull['booths']['id'])
            ->filter(function ($value, $key) {
                return $value === 'on';
            })
            ->keys()
            ->toArray();

        $booths = [];

        if (!empty($boothIds)) {
            $booths = BoothNumber::whereBetween('id', [$boothIds[0], end($boothIds)])->get();
        }

        /*Log::info('================');
        Log::info($dataPull);
        Log::info($booths);
        Log::info($vendorSubmitData);
        Log::info($vendor);
        Log::info($ref);
        Log::info($invDate);
        Log::info($agent);
        Log::info('================');*/

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

        if ($bill['data']['paid'] == 'true')
        {
            DB::table('billplz_status')->insert([
                'shopref'             => $ref,
                'billplz_id'          => $bill['id'],
                'billplz_paid'        => $bill['paid'],
                'billplz_paid_at'     => $bill['paid_at'],
                'billplz_x_signature' => $bill['x_signature'],
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);

            $pdfData = [
                'booths'           => $booths,
                'dataPull'         => $dataPull,
                'vendorSubmitData' => $vendorSubmitData,
                'vendor'           => $vendor,
                'ref'              => $ref,
                'invDate'          => $invDate,
                'agent'            => $agent->name,
            ];
            $customPaper = [0, 0, 595.28, 841.89];
            $pdf = PDF::loadView('front.confirmation-email', $pdfData)->setPaper($customPaper, 'portrait');
            $pdf->save(public_path('assets/upload/' . $ref.'.pdf'));

            Alert::success('Thank you for registration', 'We will send an email for your reference');
            return view('front.confirmation-bill', [
                'booths'           => $booths,
                'dataPull'         => $dataPull,
                'vendorSubmitData' => $vendorSubmitData,
                'vendor'           => $vendor,
                'ref'              => $ref,
                'invDate'          => $invDate,
                'agent'            => $agent->name,
            ]);
        } elseif ($bill['data']['paid'] == 'false')
        {
            Alert::warning('We are sorry', 'Your payment don\'t go through');
            return redirect()->route('front.register');
        }
        Alert::warning('We are sorry', 'Your payment don\'t go through');
        return redirect()->back();
    }

    public function billplzHandleWebhook(Request $request)
    {
        $webHook = Cache::pull('WebHook');
        $data    = $request->all();

        /*Log::info($webHook);*/

        if ($data['paid'] == 'true') {
            Log::info('================= START WEBHOOK ' . $webHook['ref'] .' ' . date('Ymd/m/y H:i') . ' =================');

            processAndUpdateBooths($webHook);
            Log::info('=== PROCESS AND UPDATE BOOTHS SAVED ===');

            BoothExhibitionBooked::insert([
                'inv_number'      => $webHook['ref'],
                'inv_date'        => $webHook['invDate'],
                'vendor_id'       => $webHook['vendor']['id'],
                'sales_agent_id'  => $webHook['vendorSubmitData']['sales_agent'],
                'inv_description' => json_encode($webHook['dataPull']),
                'add_on'          => 'data',
                'total'           => str_replace("RM ", "", $webHook['dataPull']['total']),
                'fee'             => $webHook['servicesFee'],
                'payment_status'  => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
            Log::info('=== BOOTH EXHIBITION BOOKED SAVED ===');

            DB::table('billplz_webhook')->insert([
                'shopref'       => $webHook['ref'],
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
            Log::info('=== BILLPLZ WEBHOOK SAVED ===');

            Mail::to($webHook['vendor']['email'])->send(new SendConfirmationEmail($webHook));
            Log::info('=== EMAIL SENT ===');
            Log::info('================= SUCCESSFULLY END WEBHOOK ' . date('Ymd/m/y H:i') . ' =================');
        } else {

            Log::debug($data);
            Log::info('================= UNSUCCESSFULLY WEBHOOK ' . date('Ymd/m/y H:i') . ' =================');
        }
    }
}

function processAndUpdateBooths($webHook)
{
    // Extract booth IDs from the dataPull array
    $boothIds = collect($webHook['dataPull']['booths']['id'])
        ->filter(function ($value) {
            return $value === 'on';
        })
        ->keys()
        ->toArray();

    // If there are selected booths, update them
    if (!empty($boothIds)) {
        BoothNumber::whereIn('id', $boothIds)->update([
            'vendor_id' => $webHook['vendor']['id'],
            'status'    => true
        ]);
    }
}
