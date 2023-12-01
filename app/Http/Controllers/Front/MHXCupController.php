<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\MHXCup\MHXCupRequest;
use App\Mail\SendConfirmationMHXCupEmail;
use App\Models\Apps\MHXCup\RacerNickNameRegister;
use App\Models\Apps\MHXCup\RacerRegister;
use App\Services\ImageUploader;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Billplz\Client;

class MHXCupController extends Controller
{
    protected string $view = 'front.mhxcup.';

    public function welcome()
    {
        return view($this->view.'welcome');
        // return view('front.maintenance');
    }

    public function register()
    {
        return view($this->view.'register');
    }

    public function categoryPost(Request $request)
    {
        $request->validate([
            'category'       => 'required',
            'price_category' => 'required'
        ]);
        $category = $request->input('category');
        $price_category = $request->input('price_category');

        if (empty($category) || empty($price_category))
        {
            return redirect()->route('mhxcup.register');
        } else {
            $request->session()->put([
                'category'       => $category,
                'price_category' => $price_category
            ]);
        }
        return response()->json(['message' => 'Category submitted successfully', 'redirect' => route('mhxcup.registerFrom')]);
    }

    public function registerFrom(Request $request)
    {
        /*$lastNum = RacerNickNameRegister::orderBy('id', 'DESC')->first();*/
        $category = $request->session()->only(['category', 'price_category']);
        if (!empty($category['category'])) {
            $registered = RacerRegister::where('category', $category['category'])->orderBy('id', 'DESC')->first();
        } else {
            return redirect()->route('mhxcup.register');
        }

        if ($registered) {
            $lastNumberRegister = $registered->numberRegister->last();
            if ($lastNumberRegister) {
                $register = $lastNumberRegister->register;
            } else {
                // Handle the case where no 'numberRegister' records exist for the given 'RacerRegister'.
            }
        } else {
            // Handle the case where no 'RacerRegister' records were found for the given category.
        }

        if (empty($category)) {
            return redirect()->route('mhxcup.register');
        }

        return view($this->view.'racer-register', [
            'category'   => $category,
            'lastNum'    => $register,
        ]);
    }

    public function registerPost(MHXCupRequest $request)
    {
        Log::info($request->all());

        if ($request->hasFile('receipt')) {
            $receipt = ImageUploader::uploadSingleImage($request->file('receipt'), 'assets/upload/', 'receipt_'.$request->identification_card_number);;
        } else {
            $receipt = null;
        }

        $racer = new RacerRegister();
        $racer->category                  = $request->category;
        $racer->price_category            = $request->price_category;
        $racer->total_cost                = $request->total_cost;
        $racer->full_name                 = $request->full_name;
        $racer->identification_card_number = $request->identification_card_number;
        $racer->phone_number              = $request->phone_number;
        $racer->email                     = $request->email;
        $racer->nickname                  = $request->nickname;
        $racer->team_group                = $request->team_group;
        $racer->registration              = $request->registration;
        $racer->receipt                   = $receipt;
        $racer->approval                  = false;
        $racer->payment_type              = 1;
        $racer->payment_status            = true;
        $racer->save();

        if ($request->registration > 0) {
            $lastNum = RacerNickNameRegister::orderBy('id', 'DESC')->first();
            $number = 1;
            $uniq = Str::random(4);

            $runNum = $request->runNum;
            $merchandises = $request->merchandises ?? [];

            // Check if both arrays are not empty before combining
            if (!empty($runNum)) {
                // Merge the arrays to ensure that "runNum" is processed
                $combinedData = array_map(null, $runNum, $merchandises);

                foreach ($combinedData as $data) {
                    $runNumber = $data[0];
                    $merchandise = $data[1];

                    $nickname = new RacerNickNameRegister();
                    $nickname->category  = $racer->category;
                    $nickname->racer_id  = $racer->id;
                    $nickname->uniq      = $uniq;
                    $nickname->nickname  = $racer->nickname;
                    $nickname->register  = $runNumber;
                    $nickname->shirt_zie = $merchandise;
                    $nickname->save();

                    $lastNum = $nickname;
                }
            }
        }


        Alert::success('Successfully send!', 'Your submission will be review, the email will be send to your registerd email');
        return redirect()->route('mhxcup.registerFrom');
    }

    public function mhxPayment(MHXCupRequest $request)
    {
        $uniq = Str::random(4);

        $passingData = [
            'uniq'                      => $uniq,
            'category'                  => $request->category,
            'price_category'            => $request->price_category,
            'total_cost'                => $request->total_cost,
            'full_name'                 => strtoupper($request->full_name),
            'identification_card_number' => $request->identification_card_number,
            'phone_number'              => $request->phone_number,
            'email'                     => strtolower($request->email),
            'nickname'                  => strtoupper($request->nickname),
            'team_group'                => $request->team_group,
            'registration'              => $request->registration,
            'merchandises'              => $request->merchandises,
            'runNum'                    => $request->runNum,
        ];

        $request->session()->put([
            'uniq'                      => $uniq,
            'category'                  => $request->category,
            'price_category'            => $request->price_category,
            'total_cost'                => $request->total_cost,
            'full_name'                 => strtoupper($request->full_name),
            'identification_card_number' => $request->identification_card_number,
            'phone_number'              => $request->phone_number,
            'email'                     => strtolower($request->email),
            'nickname'                  => strtoupper($request->nickname),
            'team_group'                => $request->team_group,
            'registration'              => $request->registration,
            'merchandises'              => $request->merchandises,
            'runNum'                    => $request->runNum,
        ]);

        Cache::put('WebHook', $passingData, now()->addMinute(10));

        $priceMyr = ($request->total_cost * 100);
        // $priceMyr = 100;

        $billplz = Client::make(config('billplz.billplz_mhx_key'), config('billplz.billplz_mhx_signature'));
        if(config('billplz.billplz_mhx_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        $bill = $bill->create(
            config('billplz.billplz_mhx_collection_id'),
            $request->email,
            $request->phone_number,
            $request->full_name,
            \Duit\MYR::given($priceMyr),
            route('mhxcup.webHook'),
            'Register for Mini 4WD MHX Cup 2023',
            ['redirect_url' => route('mhxcup.redirectHook')],
        );
        return redirect($bill->toArray()['url']);
    }

    public function redirectUrl(Request $request)
    {
        $uniq = $request->session()->pull('uniq');

        $billplz = Client::make(config('billplz.billplz_mhx_key'), config('billplz.billplz_mhx_signature'));
        if(config('billplz.billplz_mhx_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        try {
            $bill = $bill->redirect($request->all());
        } catch(\Exception $e) {
            dd($e->getMessage());
        }
        $bill['data'] = $billplz->bill()->get($bill['id'])->toArray();

        if ($bill['data']['paid'] == 'true') {
            DB::table('billplz_status')->insert([
                'shopref'             => $uniq,
                'billplz_id'          => $bill['id'],
                'billplz_paid'        => $bill['paid'],
                'billplz_paid_at'     => $bill['paid_at'],
                'billplz_x_signature' => $bill['x_signature'],
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);

            $dateTime = $bill['data']['paid_at']->format('Y-m-d H:i:s');

            $pdfData = [
                'uniq'                      => $uniq,
                'full_name'                 => $request->session()->pull('full_name'),
                'identification_card_number' => $request->session()->pull('identification_card_number'),
                'group'                     => $request->session()->pull('team_group'),
                'email'                     => $request->session()->pull('email'),
                'phone_number'              => $request->session()->pull('phone_number'),
                'create_date'               => $dateTime,
                'category'                  => $request->session()->pull('category'),
                'registration'              => $request->session()->pull('registration'),
                'price_category'            => $request->session()->pull('price_category'),
                'total_cost'                => $request->session()->pull('total_cost'),
                'runNum'                    => $request->session()->pull('runNum'),
                'merchandises'              => $request->session()->pull('merchandises'),
                'nickname'                  => $request->session()->pull('nickname')
            ];

            if (!empty($pdfData)){
                Alert::success('Thank you for registration', 'We will send an email for your reference');
                return view($this->view.'complete-reg-mhxcup', compact('pdfData'));
            } else {
                return redirect()->route('mhxcup.register');
            }
        } elseif ($bill['data']['paid'] == 'false') {
            Alert::warning('We are sorry', 'Your payment don\'t go through');
            return 'payment cancel';
        }
    }

    public function webhook(Request $request)
    {
        $webHook = Cache::pull('WebHook');
        $data    = $request->all();

        if (!empty($data) || !empty($webHook)){

            Log::info('== MHXCUP PAYMENT ==');
            Log::info($webHook);

            if ($data['paid'] == 'true') {

                Log::info('==');
                Log::info($data);
                Log::info('== MHXCUP PAYMENT PROSES START '. date('Ymd/m/y H:i') .' ==');

                $racer = new RacerRegister();
                $racer->uniq                      = $webHook['uniq'];
                $racer->category                  = $webHook['category'];
                $racer->price_category            = $webHook['price_category'];
                $racer->total_cost                = $webHook['total_cost'];
                $racer->full_name                 = $webHook['full_name'];
                $racer->identification_card_number = $webHook['identification_card_number'];
                $racer->phone_number              = $webHook['phone_number'];
                $racer->email                     = $webHook['email'];
                $racer->nickname                  = $webHook['nickname'];
                $racer->team_group                = $webHook['team_group'];
                $racer->registration              = $webHook['registration'];
                $racer->receipt                   = null;
                $racer->approval                  = true;
                $racer->payment_type              = 2;
                $racer->payment_status            = true;
                $racer->save();

                Log::info('== RACER REGISTER ==');

                if ($webHook['registration'] > 0) {
                    $uniq = $webHook['uniq'];
                    $runNum = $webHook['runNum'];
                    $merchandises = $webHook['merchandises'] ?? [];

                    // Check if both arrays are not empty before combining
                    if (!empty($runNum)) {
                        // Merge the arrays to ensure that "runNum" is processed
                        $combinedData = array_map(null, $runNum, $merchandises);

                        foreach ($combinedData as $data) {
                            $runNumber = $data[0];
                            $merchandise = $data[1];

                            $nickname = new RacerNickNameRegister();
                            $nickname->category  = $racer->category;
                            $nickname->racer_id  = $racer->id;
                            $nickname->uniq      = $uniq;
                            $nickname->nickname  = $racer->nickname;
                            $nickname->register  = ltrim($runNumber, 0);
                            $nickname->shirt_zie = $merchandise;
                            $nickname->save();

                            $lastNum = $nickname;
                        }
                    }
                }

                Log::info('== RACER RUNNING NUMBER ==');

                $billplzData = [
                    'shopref'       => $webHook['uniq'],
                    'billplz_id'    => $request['id'],
                    'collection_id' => $request['collection_id'],
                    'paid'          => $request['paid'],
                    'state'         => $request['state'],
                    'amount'        => $request['amount'],
                    'paid_amount'   => $request['paid_amount'],
                    'due_at'        => $request['due_at'],
                    'email'         => $request['email'],
                    'mobile'        => $request['mobile'],
                    'name'          => $request['name'],
                    'url'           => $request['url'],
                    'paid_at'       => $request['paid_at'],
                    'x_signature'   => $request['x_signature'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];

                DB::table('billplz_webhook')->insert($billplzData);

                Log::info('=== BILLPLZ WEBHOOK SAVED ===');

                $pdfData = [
                    'uniq'                      => $webHook['uniq'],
                    'full_name'                 => $webHook['full_name'],
                    'identification_card_number' => $racer->identification_card_number,
                    'group'                     => $racer->team_group,
                    'email'                     => $racer->email,
                    'phone_number'              => $racer->phone_number,
                    'create_date'               => $racer->created_at,
                    'category'                  => $racer->category,
                    'registration'              => $racer->registration,
                    'price_category'            => $racer->price_category,
                    'total_cost'                => $racer->total_cost,
                    'runNum'                    => $racer->numberRegister,
                    'nickname'                  => $racer->nickname,
                ];

                $customPaper = [0, 0, 595.28, 841.89];

                $pdfPath = public_path('assets/upload/' . $webHook['uniq'] .'_'.strtoupper($racer->nickname) . '.pdf');

                if (file_exists($pdfPath)) {
                    // If the file already exists, overwrite it
                    $pdf = PDF::loadView('front.mhxcup.receipt-mhxcup', $pdfData)->setPaper($customPaper, 'portrait')
                        ->save($pdfPath);
                } else {
                    // If the file doesn't exist, create a new one
                    $pdf = PDF::loadView('front.mhxcup.receipt-mhxcup', $pdfData)->setPaper($customPaper, 'portrait')
                        ->save($pdfPath);
                }

                // $pdf = PDF::loadView('front.mhxcup.receipt-mhxcup', $pdfData)->setPaper($customPaper, 'portrait')
                //     ->save(public_path('assets/upload/' . $webHook['uniq'].'_'.strtoupper($racer->nickname) . '.pdf'));

                Log::info('PDF SAVED' . date('d-m-Y-H-i-s'));

                Mail::to($racer->email)->send(new SendConfirmationMHXCupEmail($pdfData));
                Log::info('== EMAIL SENT ==');
                Log::info('== MHX CUP REGISTER DONE ==');

            } elseif ($data['paid'] == 'false') {

                Log::info('=== CANCEL OF PAYMENT MHXCUp ===');
                Log::debug($data);
                Log::info('=== UNSUCCESSFULLY WEBHOOK ' . date('Ymd/m/y H:i') . ' ===');

            }
        } else {

            Log::info('NO RETURN');
            Log::info('=== MHXCUP UNSUCCESSFULLY WEBHOOK ' . date('Ymd/m/y H:i') . ' ===');

        }
    }

    public function cashPayment(Request $request)
    {
        $uniq = Str::random(4);

        $webHook = [
            'uniq'                      => $uniq,
            'category'                  => $request->input('category'),
            'price_category'            => $request->input('price_category'),
            'total_cost'                => $request->input('total_cost'),
            'full_name'                 => strtoupper($request->input('full_name')),
            'identification_card_number' => $request->input('identification_card_number'),
            'phone_number'              => $request->input('phone_number'),
            'email'                     => strtolower($request->input('email')),
            'nickname'                  => strtoupper($request->input('nickname')),
            'team_group'                => $request->input('team_group'),
            'registration'              => $request->input('registration'),
            'merchandises'              => $request->input('merchandises'),
            'runNum'                    => $request->input('runNum'),
        ];

        $racer = new RacerRegister();
        $racer->uniq                      = $webHook['uniq'];
        $racer->category                  = $webHook['category'];
        $racer->price_category            = $webHook['price_category'];
        $racer->total_cost                = $webHook['total_cost'];
        $racer->full_name                 = $webHook['full_name'];
        $racer->identification_card_number = $webHook['identification_card_number'];
        $racer->phone_number              = $webHook['phone_number'];
        $racer->email                     = $webHook['email'];
        $racer->nickname                  = $webHook['nickname'];
        $racer->team_group                = $webHook['team_group'];
        $racer->registration              = $webHook['registration'];
        $racer->receipt                   = null;
        $racer->approval                  = false;
        $racer->payment_type              = 3;
        $racer->payment_status            = false;
        $racer->save();

        Log::info('== RACER REGISTER ==');

        if ($webHook['registration'] > 0) {
            $uniq = $webHook['uniq'];
            $runNum = $webHook['runNum'];
            $merchandises = $webHook['merchandises'] ?? [];

            // Check if both arrays are not empty before combining
            if (!empty($runNum)) {
                // Merge the arrays to ensure that "runNum" is processed
                $combinedData = array_map(null, $runNum, $merchandises);

                foreach ($combinedData as $data) {
                    $runNumber = $data[0];
                    $merchandise = $data[1];

                    $nickname = new RacerNickNameRegister();
                    $nickname->category  = $racer->category;
                    $nickname->racer_id  = $racer->id;
                    $nickname->uniq      = $uniq;
                    $nickname->nickname  = $racer->nickname;
                    $nickname->register  = ltrim($runNumber, 0);
                    $nickname->shirt_zie = $merchandise;
                    $nickname->save();

                    $lastNum = $nickname;
                }
            }
        }

        return response()->json([
            'status'   => true,
            'data'     => $webHook,
            'redirect' => route('mhxcup.mhxCashConfirm'),
        ]);
    }

    public function cashPaymentConfirm(Request $request)
    {
        
        return view($this->view.'cash-confirm');
    }
}
