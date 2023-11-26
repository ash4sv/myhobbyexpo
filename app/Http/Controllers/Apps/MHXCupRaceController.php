<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacerRegister;
use App\Models\Apps\MHXCup\Racing;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingRacers;
use App\Models\Apps\MHXCup\RacingTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class MHXCupRaceController extends Controller
{
    protected string $view = 'apps.mhx-cup.races.';
    protected string $route = 'apps.event-mhx-cup.races.';

    public function index()
    {
        $races = Racing::all();
        return view($this->view.'index', [
            'races' => $races
        ]);
    }

    public function create()
    {
        return view($this->view.'create', [
            'categories' => RacingCategory::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'racing_category' => 'required',
            'racing_track' => 'required',
            'racing_date' => 'required',
            'racing_time' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'line_3' => 'required',
        ]);

        $race = new Racing();
        $race->racing_categories_id = $request->racing_category;
        $race->racing_tracks_id = $request->racing_track;
        $race->racing_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->racing_date)));
        $race->racing_time = date('H:i:s', strtotime($request->racing_time));
        $race->racer_1 = $request->line_1;
        $race->racer_2 = $request->line_2;
        $race->racer_3 = $request->line_3;
        $race->save();

        Alert::success('Race successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'show', $race);
    }

    public function show(string $id)
    {
        $race = Racing::where('id', $id)->first();
        return view($this->view.'show', [
            'race' => $race
        ]);
    }

    public function getCategoryData($categoryId)
    {
        $tracks = RacingTrack::where('racing_categories_id', $categoryId)->get();
        $racerRegisters = RacingRacers::where('racing_categories_id', $categoryId)->get();

        return response()->json([
            'tracks' => $tracks,
            'racerRegisters' => $racerRegisters]
        );
    }


//    public function racingDay()
//    {
//        return view('apps.mhx-cup.racing.index', [
//            'racing' => Racing::all()
//        ]);
//    }
//
//    public function store(Request $request)
//    {
//        $data = $request->validate([
//            'line_1' => 'required|string',
//        ]);
//        $this->saveRacingData($data);
//        return redirect()->back();
//        // return view('racing.create', ['latestData' => $latestData])->with('success', 'Racing data submitted successfully!');
//    }
//
//    private function saveRacingData($data)
//    {
//        $racing = Racing::latest()->first();
//
//        if ($racing) {
//            if ($racing->line_1 === null) {
//                $racing->line_1 = $data['line_1'];
//            } elseif ($racing->line_2 === null) {
//                $racing->line_2 = $data['line_1'];
//            } elseif ($racing->line_3 === null) {
//                $racing->line_3 = $data['line_1'];
//            } else {
//                Racing::create(['line_1' => $data['line_1']]);
//            }
//            $racing->save();
//        } else {
//            Racing::create(['line_1' => $data['line_1']]);
//        }
//    }



}
