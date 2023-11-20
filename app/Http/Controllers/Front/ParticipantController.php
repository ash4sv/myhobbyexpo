<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            return response()->json(['status' => false, 'message' => 'Item not found in the cart']);
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

            return response()->json(['status' => true, 'message' => 'Quantity updated successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Item not found in the cart']);
        }
    }


}
