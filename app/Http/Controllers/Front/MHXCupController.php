<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\MHXCup\MHXCupRequest;
use App\Models\Apps\MHXCup\RacerNickNameRegister;
use App\Models\Apps\MHXCup\RacerRegister;
use App\Services\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MHXCupController extends Controller
{
    protected string $view = 'front.mhxcup.';

    public function welcome()
    {
        return view($this->view.'welcome');
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
        $request->session()->put([
            'category'       => $category,
            'price_category' => $price_category
        ]);
        return response()->json(['message' => 'Category submitted successfully', 'redirect' => route('mhxcup.registerFrom')]);
    }

    public function registerFrom(Request $request)
    {
        $category = $request->session()->only(['category', 'price_category']);
        return view($this->view.'racer-register', [
            'category' => $category
        ]);
    }

    public function registerPost(MHXCupRequest $request)
    {
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
        $racer->save();

        if ($request->registration > 0) {
            $lastNum = RacerNickNameRegister::orderBy('id', 'DESC')->first();
            $number = 1;
            $uniq = Str::random(4);

            foreach ($request->merchandises as $merchandise) {
                if ($lastNum) {
                    $number = $lastNum->register + 1;
                }

                $nickname = new RacerNickNameRegister();
                $nickname->racer_id  = $racer->id;
                $nickname->uniq      = $uniq;
                $nickname->nickname  = $racer->nickname;
                $nickname->register  = $number;
                $nickname->shirt_zie = $merchandise;
                $nickname->save();

                $lastNum = $nickname;
                $number++; // Increment the number for the next iteration
            }
        }

        Alert::success('Successfully send!', 'Your submission will be review, the email will be send to your registerd email');
        return redirect()->route('mhxcup.registerFrom');
    }

    public function mhxPayment(MHXCupRequest $request)
    {
        $passingData = [
            'category'                  => $request->category,
            'price_category'            => $request->price_category,
            'total_cost'                => $request->total_cost,
            'full_name'                 => $request->full_name,
            'identification_card_number' => $request->identification_card_number,
            'phone_number'              => $request->phone_number,
            'email'                     => $request->email,
            'nickname'                  => $request->nickname,
            'team_group'                => $request->team_group,
            'registration'              => $request->registration,
            'merchandises'              => $request->merchandises,
        ];

        Cache::put('WebHook', $passingData, now()->addMinute(20));

        /*$billplz = Client::make(config('billplz.billplz_mhx_key'), config('billplz.billplz_mhx_signature'));
        if(config('billplz.billplz_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        $bill = $bill->create(
            config('billplz.billplz_mhx_collection_id'),
            $request->email,
            $request->phone_number,
            $request->full_name,
            \Duit\MYR::given($request->total_cost),
            route('mhxcup.webhook'),
            'Register for Mini 4WD MHX Cup 2023',
            ['redirect_url' => route('mhxcup.redirect')]
        );

        return redirect($bill->toArray()['url']);*/
    }

    public function redirect(Request $request)
    {
    }

    public function webhook(Request $request)
    {
        $webHook = Cache::pull('WebHook');
        $data    = $request->all();

        if (!empty($webHook))
        {
            return [
                $webHook,
                $data
            ];
        }
        elseif ($data['paid'] == 'false')
        {

        }
    }
}
