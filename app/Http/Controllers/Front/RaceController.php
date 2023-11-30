<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingResult;
use App\Models\Apps\MHXCup\RacingScoreBoard;
use App\Models\Apps\MHXCup\RacingTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RaceController extends Controller
{
    public function scoreboard($category, $track)
    {
        $category = RacingCategory::where('slug', $category)->first();
        $categoryID = $category->id;
        $track    = RacingTrack::where('slug', $track)->first();
        $trackID    = $track->id;

        $results = RacingResult::where('racing_categories_id', $categoryID)->where('racing_tracks_id', $trackID)->get();
        $racingScore = RacingScoreBoard::where('racing_categories_id', $categoryID)->where('racing_tracks_id', $trackID)->get()->last();

        $filteredResults = $results->filter(function ($result) {
            return $result->racing_racers_1_status == 1
                || $result->racing_racers_2_status == 1
                || $result->racing_racers_3_status == 1;
        });

        $selectedRacers = $filteredResults->flatMap(function ($result) {
            $selectedRacers = [];
            if ($result->racing_racers_1_status == 1) {
                $selectedRacers[] = $result->racing_racers_1;
            }
            if ($result->racing_racers_2_status == 1) {
                $selectedRacers[] = $result->racing_racers_2;
            }
            if ($result->racing_racers_3_status == 1) {
                $selectedRacers[] = $result->racing_racers_3;
            }
            return $selectedRacers;
        });

        $listRaces = RacingScoreBoard::where('racing_categories_id', $category)->where('racing_tracks_id', $track)->get();
        // return $selectedRacers;
        return view('front.mhxcup.race-score', [
            'listRaces' => $listRaces,
            'category' => $category,
            'track' => $track
        ]);
    }
}
