<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingScoreBoard;
use App\Models\Apps\MHXCup\RacingTrack;
use Illuminate\Http\Request;

class MHXCupBoardController extends Controller
{
    protected string $view = 'apps.mhx-cup.score.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semiTechClassA = RacingCategory::where('category_name', 'Semi-Tech Class A')->first();
        $bMaxClassB = RacingCategory::where('category_name', 'B-Max Class B')->first();
        $stockCarClassC = RacingCategory::where('category_name', 'Stock-Car Class C')->first();

        $trackssemiTechClassA = RacingTrack::where('racing_categories_id', $semiTechClassA->id)->get();
        $tracksbMaxClassB     = RacingTrack::where('racing_categories_id', $bMaxClassB->id)->get();
        $tracksstockCarClassC = RacingTrack::where('racing_categories_id', $stockCarClassC->id)->get();

        $semiTechClassAScore = RacingScoreBoard::where('racing_categories_id', $semiTechClassA->id)->get();
        $bMaxClassBScore     = RacingScoreBoard::where('racing_categories_id', $bMaxClassB->id)->get();
        $stockCarClassCScore = RacingScoreBoard::where('racing_categories_id', $stockCarClassC->id)->get();

        return view($this->view.'index', [
            'trackssemiTechClassA' => $trackssemiTechClassA,
            'tracksbMaxClassB' => $tracksbMaxClassB,
            'tracksstockCarClassC' => $tracksstockCarClassC,
            'semiTechClassAScores' => $semiTechClassAScore,
            'bMaxClassBScores' => $bMaxClassBScore,
            'stockCarClassCScores' => $stockCarClassCScore,
            'semiTechClassA' => $semiTechClassA,
            'bMaxClassB' => $bMaxClassB,
            'stockCarClassC' => $stockCarClassC,
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
        $category = $request->input('category_id');
        $track = $request->input('track_id');
        $racer = $request->input('racer_id');

        $scoreData = RacingScoreBoard::where('racing_categories_id', $category)->where('racing_tracks_id', $track)->latest()->first();
        if ($scoreData) {
            if ($scoreData->line_1 === null) {
                $scoreData->line_1 = $racer;
            } elseif ($scoreData->line_2 === null) {
                $scoreData->line_2 = $racer;
            } elseif ($scoreData->line_3 === null) {
                $scoreData->line_3 = $racer;
            } else {
                RacingScoreBoard::create([
                    'racing_categories_id' => $category,
                    'racing_tracks_id' => $track,
                    'line_1' => $racer,
                ]);
            }
            $scoreData->save();
        } else {
            RacingScoreBoard::create([
                'racing_categories_id' => $category,
                'racing_tracks_id' => $track,
                'line_1' => $racer,
            ]);
        }
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
