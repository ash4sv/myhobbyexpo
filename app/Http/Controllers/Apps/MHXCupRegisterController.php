<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacerRegister;
use Illuminate\Http\Request;

class MHXCupRegisterController extends Controller
{
    protected string $view = 'apps.mhx-cup.register.';
    protected string $route = 'apps.mhx-cup.register.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Register!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $registers = RacerRegister::where('category', 'b-max class b')->get();
        return view($this->view.'index');
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
}
