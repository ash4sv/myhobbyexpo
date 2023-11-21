<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendConfirmationTicket;
use App\Models\Apps\VisitorTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Billplz\Client;
use RealRashid\SweetAlert\Facades\Alert;

class ParticipantController extends Controller
{
    public function formView()
    {
        return view('front.participant.register');
    }

    public function formPost(Request $request)
    {
        $cart = Session::has('cart') ? Session::get('cart') : [];

        foreach ($request->tickets as $ticket) {
            $ticketType = $ticket['ticketType'];
            $ticketQuantity = $ticket['ticketQuantity'];

            if ($ticketQuantity > 0) {
                $existingTicketKey = array_search($ticketType, array_column($cart, 'ticketType'));

                if ($existingTicketKey !== false) {
                    // If the ticketType exists, update the quantity
                    $cart[$existingTicketKey]['ticketQuantity'] += $ticketQuantity;
                } else {
                    // If the ticketType doesn't exist, add a new entry
                    $ticketData = [
                        'ticketType' => $ticketType,
                        'ticketTypePrice' => $ticket['ticketTypePrice'],
                        'ticketQuantity' => $ticketQuantity,
                    ];
                    $cart[] = $ticketData;
                }
            }
        }

        Session::put('cart', $cart);
        return response()->json([
            'status' => true,
            'message' => 'Category submitted successfully',
            'redirect' => route('participant.cart')
        ]);
    }

    public function cartView(Request $request)
    {
        $cart = Session::get('cart');

        if ($cart) {
            $total = 0;

            // Calculate total for each item and sum them up
            foreach ($cart as &$item) { // Note the "&" to reference the original array elements
                $itemTotal = $item['ticketTypePrice'] * $item['ticketQuantity'];
                $total += $itemTotal;
                $item['total'] = $itemTotal; // Add the 'total' key to each item
            }

            return view('front.participant.cart', [
                'cartItems' => $cart,
                'overallTotal' => $total,
            ]);
        } else {
            return redirect()->route('participant.form');
        }
    }

    public function removeCartItem(Request $request)
    {
        $ticketTypeToRemove = $request->input('ticketType');

        $cart = Session::get('cart', []);

        $itemKeyToRemove = array_search($ticketTypeToRemove, array_column($cart, 'ticketType'));

        if ($itemKeyToRemove !== false) {
            unset($cart[$itemKeyToRemove]);
            Session::put('cart', array_values($cart));
            return response()->json([
                'status' => true,
                'message' => 'Item removed successfully']
            );
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Item not found in the cart'
            ]);
        }
    }

    public function updateQuantity(Request $request)
    {
        $ticketTypeToUpdate = $request->input('ticketType');
        $newQuantity = $request->input('newQuantity');

        $cart = Session::get('cart', []);

        // Find the key of the item with the specified ticketType
        $itemKeyToUpdate = array_search($ticketTypeToUpdate, array_column($cart, 'ticketType'));

        if ($itemKeyToUpdate !== false) {
            // Update the quantity for the item
            $cart[$itemKeyToUpdate]['ticketQuantity'] = $newQuantity;

            // Update the cart session
            Session::put('cart', $cart);

            return response()->json([
                'status' => true,
                'message' => 'Quantity updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Item not found in the cart'
            ]);
        }
    }

    public function updateSession(Request $request)
    {
        Session::put('cart', $request->session()->get('cart', []));
        return response()->json([
            'status' => true,
            'message' => 'Session updated successfully'
        ]);
    }

    public function confirmCheckout(Request $request)
    {
        // Extract data from the request
        $cartItems = $request->input('cart');
        $visitorDetails = $request->input('visitorDetails');
        $overallTotal = $request->input('overallTotal');
        $uniq = Str::random(8);

        // push payment gateways
        // $priceMyr = ($overallTotal * 100);
        $priceMyr = 100;

        $billplz = Client::make(config('billplz.billplz_key'), config('billplz.billplz_signature'));
        if(config('billplz.billplz_sandbox')) {
            $billplz->useSandbox();
        }
        $bill = $billplz->bill();
        $bill = $bill->create(
            config('billplz.billplz_collection_id'),
            $visitorDetails['email'],
            $visitorDetails['phone_number'],
            $visitorDetails['full_name'],
            \Duit\MYR::given($priceMyr),
            route('participant.webhook'),
            'Purchasing of MHX Ticket',
            ['redirect_url' => route('participant.redirection')],
        );

        // save cart:temp
        DB::table('carts_temp')->insert([
            'uniq'         => $uniq,
            'cart'         => json_encode($cartItems),
            'overallTotal' => $overallTotal,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // save visitor:temp
        DB::table('visitors_temp')->insert([
            'uniq'       => $uniq,
            'visitor'    => json_encode($visitorDetails),
            'billplz'    => json_encode($bill->toArray()),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::forget('cart');

        // Return a response indicating success
        return response()->json([
            'status' => true,
            'message' => 'Checkout confirmed successfully',
            'redirect' => $bill->toArray()['url']
        ]);
    }

    public function redirectUrl(Request $request)
    {
        // Search in visitor:temp billplz id
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

        if ($bill['data']['paid'] == 'true') {
            $id = $bill['data']['id'];
            $visitor = DB::table('visitors_temp')->whereJsonContains('billplz->id', $id)->first();
            $carts = DB::table('carts_temp')->where('uniq', $visitor->uniq)->first();

            DB::table('billplz_status')->insert([
                'shopref'             => $visitor->uniq,
                'billplz_id'          => $bill['id'],
                'billplz_paid'        => $bill['paid'],
                'billplz_paid_at'     => $bill['paid_at'],
                'billplz_x_signature' => $bill['x_signature'],
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);

            Alert::success('Thank you for registration', 'We will send an email for your reference');
            return view('front.participant.receipt', [
                'visitor' => $visitor,
                'carts'   => $carts
            ]);
        } elseif ($bill['data']['paid'] == 'false') {
            Alert::warning('We are sorry', 'Your payment don\'t go through');
        }

        // Show receipt
    }

    public function webhook(Request $request)
    {
        $data = $request->all();

        if (!empty($data)) {

            Log::info('==== Ticket ====');
            if ($data['paid'] == 'true') {

                $id = $data['id'];
                $visitor = DB::table('visitors_temp')->whereJsonContains('billplz->id', $id)->first();
                $carts = DB::table('carts_temp')->where('uniq', $visitor->uniq)->first();

                $ticket                 = new VisitorTicket();
                $ticket->uniq           = $visitor->uniq;
                $ticket->visitor        = $visitor->visitor;
                $ticket->cart           = $carts->cart;
                $ticket->overallTotal   = $carts->overallTotal;
                $ticket->billplz        = $visitor->billplz;
                $ticket->payment_status = true;
                $ticket->save();

                $billplzData = [
                    'shopref'       => $visitor->uniq,
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

                $pdfData = [
                    'visitor' => $visitor,
                    'carts'   => $carts,
                ];

                $customPaper = [0, 0, 595.28, 841.89];
                $pdfPath = public_path('assets/upload/' . $visitor->uniq . '_' . json_decode($visitor->visitor)->identification_card_number . '.pdf');

                if (file_exists($pdfPath)) {
                    // If the file already exists, overwrite it
                    $pdf = PDF::loadView('front.participant.receipt-pdf', $pdfData)->setPaper($customPaper, 'portrait')
                        ->save($pdfPath);
                } else {
                    // If the file doesn't exist, create a new one
                    $pdf = PDF::loadView('front.participant.receipt-pdf', $pdfData)->setPaper($customPaper, 'portrait')
                        ->save($pdfPath);
                }

                Log::info('TICKET PDF SAVED' . date('d-m-Y-H-i-s'));

                Mail::to(json_decode($visitor->visitor)->email)->send(new SendConfirmationTicket($pdfData));

                Log::info('== TICKET EMAIL SENT ==');
                Log::info('== TICKET PURCHASE DONE ==');

            } elseif ($data['paid'] == 'false') {

                Log::info('=== CANCEL OF PAYMENT TICKET ===');
                Log::debug($data);
                Log::info('=== UNSUCCESSFULLY TICKET WEBHOOK ' . date('Ymd/m/y H:i') . ' ===');

            }

        } else {

            Log::info('TICKET NO RETURN');
            Log::info('=== TICKET UNSUCCESSFULLY WEBHOOK ' . date('Ymd/m/y H:i') . ' ===');

        }
    }
}
