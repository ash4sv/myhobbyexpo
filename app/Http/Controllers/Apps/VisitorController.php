<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\VisitorTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    protected string $view = 'apps.visitor.';

    private function countShirtSizes($cartData)
    {
        $ticketTypeCounts = [
            'ELF MUSIC PACK' => 0,
            'CHOII LIMITED EDITION PACK' => 0,
            'CHOII 64 LIMITED EDITION PACK' => 0,
            'ADULT TICKET' => 0,
            'KIDS TICKET' => 0,
        ];
        foreach ($cartData as $item) {
            $cart = json_decode($item->cart, true);

            foreach ($cart as $product) {
                $ticketType = $product['ticketType'];
                $ticketQuantity = $product['ticketQuantity'];

                // Increment the count for the current ticketType, considering ticketQuantity
                $ticketTypeCounts[$ticketType] = isset($ticketTypeCounts[$ticketType])
                    ? $ticketTypeCounts[$ticketType] + $ticketQuantity
                    : $ticketQuantity;
            }
        }
        return $ticketTypeCounts;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = VisitorTicket::all();
        $visitorCount = $this->countShirtSizes($visitors);
        return view($this->view.'index', [
            'visitors'     => $visitors,
            'visitorCount' => $visitorCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visitor = VisitorTicket::findOrFail($id);

        return view($this->view.'show', [
            'visitor' => $visitor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visitor = VisitorTicket::findOrFail($id);

        return view($this->view.'edit', [
            'visitor' => $visitor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateRedeemStatus(string $id)
    {
        $visitor = VisitorTicket::find($id);
        $visitor->redeem_status = 1;
        $visitor->save();

        return response()->json([
            'status' => true,
            'title' => 'Redeem status updated successfully.',
            'msg' => 'The redeem status has been updated to ' . $visitor->redeem_status,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
