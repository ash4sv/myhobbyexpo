<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacerNickNameRegister;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingRacers;
use Illuminate\Http\Request;

class MHXCupRacerController extends Controller
{
    protected string $view = 'apps.mhx-cup.racers.';
    protected string $route = 'apps.event-mhx-cup.racers.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $racerRegisters = RacerNickNameRegister::all();
        createUniquePatentAndSave($racerRegisters);

        $categories = RacingCategory::all();
        $racer = RacingRacers::all();
        return view($this->view.'index', [
            'racers' => $racer,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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

function createUniquePatentAndSave($data)
{
    foreach ($data as $item) {
        $callingName = strtoupper($item->nickname) . sprintf('%03d', $item->register);
        $existingRacer = RacingRacers::where('racer_name', $callingName)
            ->where('racing_categories_id', getCategoryIdByCategoryName($item->category))
            ->first();

        if (!$existingRacer) {
            RacingRacers::create([
                'racer_registers_id' => $item->racer_id,
                'racing_categories_id' => getCategoryIdByCategoryName($item->category),
                'racer_name' => strtoupper($item->nickname) . sprintf('%03d', $item->register),
            ]);
        }
    }
}

function getCategoryIdByCategoryName($category)
{
    $categoryModel = RacingCategory::where('category_name', $category)->first();
    return $categoryModel->id;
}
