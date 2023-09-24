<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\PreRegistration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PreRegisterController extends Controller
{
    private string $view = 'apps.preregister.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();
        return view($this->view.'index', [
            'selling_vendor' => $selling_vendor,
            'hobby_activity' => $hobby_activity,
            'hobby_showoff' => $hobby_showoff,
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
        $registered = PreRegistration::findOrFail($id);
        return view($this->view.'show', [
            'registered' => $registered
        ]);
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
        $registered = PreRegistration::findOrFail($id);
        $registered->delete();
        Alert::success('Deleted!', 'Registered successfully deleted!');
        return redirect()->back();
    }
}
