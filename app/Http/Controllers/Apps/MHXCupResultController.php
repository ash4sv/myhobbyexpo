<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacingResult;
use Illuminate\Http\Request;

class MHXCupResultController extends Controller
{
    protected string $view = 'apps.mhx-cup.results.';
    protected string $route = 'apps.event-mhx-cup.results.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = RacingResult::all();
        return view($this->view.'index', [
            'results' => $results
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
}
