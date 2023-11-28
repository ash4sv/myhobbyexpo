<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\VisitorShopeeTicket;
use Illuminate\Http\Request;

class VisitorShopeeController extends Controller
{
    protected string $view = 'apps.visitor.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = VisitorShopeeTicket::all();
        return view($this->view.'shopee', [
            'visitors'     => $visitors,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function shopeeData()
    {
        $visitors = VisitorShopeeTicket::all();
        return response()->json($visitors);
    }

    public function shopeeRedeem(Request $request)
    {
        $id = $request->input('id');

        $ticket = VisitorShopeeTicket::findOrFail($id);
        $ticket->update([
            'status' => true
        ]);

        return response()->json([
            'status' => true,
            'ticket' => $ticket
        ]);
    }
}
