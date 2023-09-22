<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\PreRegistration;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    private string $view = 'apps.preregister.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->view.'index', [
            'registers' => PreRegistration::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create', [
            'register' => new PreRegistration()
        ]);
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
        $register = PreRegistration::findOrFail($id);
        return view($this->view.'edit', [
            'register' => $register
        ]);
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
