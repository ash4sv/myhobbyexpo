<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    protected $view = 'apps.agents.';
    protected $route = 'apps.agent.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->view.'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create');
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
        return view($this->view.'edit');
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
