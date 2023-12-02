<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacerRegister;
use App\Models\Apps\MHXCup\Racing;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingRacers;
use App\Models\Apps\MHXCup\RacingResult;
use App\Models\Apps\MHXCup\RacingTrack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
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
            /*'racing_date' => 'required',*/
            /*'racing_time' => 'required',*/
            'line_1' => [
                'required',
                'min:1',
                /*Rule::unique('racings', 'racer_1')
                    ->where('racing_categories_id', $request->racing_category)
                    ->where('racing_tracks_id', $request->racing_track),*/
            ],
            'line_2' => [
                'required',
                'min:1',
                /*Rule::unique('racings', 'racer_2')
                    ->where('racing_categories_id', $request->racing_category)
                    ->where('racing_tracks_id', $request->racing_track),*/
            ],
            'line_3' => [
                'nullable',
                'min:1',
                /*Rule::unique('racings', 'racer_3')
                    ->where('racing_categories_id', $request->racing_category)
                    ->where('racing_tracks_id', $request->racing_track),*/
            ],
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
        $race = Racing::where('id', $id)->where('status', null)->with('mhxcupresult')->first();
        if (!empty($race->mhxcupresult)) {
            $result_racer_1 = 'enabled';
            $result_racer_2 = 'enabled';
            $result_racer_3 = 'enabled';
            $result_racer_1_result = false;
            $result_racer_2_result = false;
            $result_racer_3_result = false;
            foreach ($race->mhxcupresult as $result) {
                // Assuming these are integers (0 or 1)
                $result_racer_1 = ($result->racing_racers_1_status === null) ? 'enabled' : 'disabled';
                $result_racer_1_result = $result->racing_racers_1_status;
                $result_racer_2 = ($result->racing_racers_2_status === null) ? 'enabled' : 'disabled';
                $result_racer_2_result = $result->racing_racers_2_status;
                $result_racer_3 = ($result->racing_racers_3_status === null) ? 'enabled' : 'disabled';
                $result_racer_3_result = $result->racing_racers_3_status;
            }
        } else {
            return redirect()->route('apps.event-mhx-cup.races.create');
        }
        return view($this->view.'show', [
            'race' => $race,
            'result_racer_1' => $result_racer_1,
            'result_racer_2' => $result_racer_2,
            'result_racer_3' => $result_racer_3,
            'result_racer_1_result' => $result_racer_1_result,
            'result_racer_2_result' => $result_racer_2_result,
            'result_racer_3_result' => $result_racer_3_result,
        ]);
    }

    public function getCategoryData($categoryId)
    {
        $tracks = RacingTrack::where('racing_categories_id', $categoryId)->get();
        $racerRegisters = RacingRacers::where('racing_categories_id', $categoryId)
            ->where(function ($query) {
                $query->orWhereNull('slot_1')
                    ->orWhereNull('slot_2')
                    ->orWhereNull('slot_3')
                    ->orWhereNull('slot_4')
                    ->orWhereNull('slot_5')
                    ->orWhereNull('slot_6')
                    ->orWhereNull('slot_7')
                    ->orWhereNull('slot_8')
                    ->orWhereNull('slot_9')
                    ->orWhereNull('slot_10')
                    ->orWhereNull('slot_11')
                    ->orWhereNull('slot_12')
                    ->orWhereNull('slot_13')
                    ->orWhereNull('slot_14')
                    ->orWhereNull('slot_15')
                    ->orWhereNull('slot_16')
                    ->orWhereNull('slot_17')
                    ->orWhereNull('slot_18')
                    ->orWhereNull('slot_19')
                    ->orWhereNull('slot_20');
            })
            ->get();

        return response()->json([
            'tracks' => $tracks,
            'racerRegisters' => $racerRegisters
        ]);
    }

    public function submitResult(Request $request)
    {
        $racing_categories = $request->input('racing_category');
        $racing_track = $request->input('racing_track');
        $racing_racers = $request->input('racing_racers');
        $races = $request->input('races');
        $racer = $request->input('racer');
        $status = $request->input('status');

        $resultExisting = RacingResult::where('racings_id', $races)->first();
        $checkRacer = RacingRacers::findOrFail($racer);
        $racesComplete = Racing::findOrFail($races);

        if ($racesComplete->status != 1) {
            if ($resultExisting) {
                if ($racing_racers == 'racing_racers_1' && $resultExisting->racing_racers_1 === null) {
                    $resultExisting->racing_racers_1 = $racer;
                    $resultExisting->racing_racers_1_status = $status;
                    $resultExisting->save();
                } elseif ($racing_racers == 'racing_racers_2' && $resultExisting->racing_racers_2 === null) {
                    $resultExisting->racing_racers_2 = $racer;
                    $resultExisting->racing_racers_2_status = $status;
                    $resultExisting->save();
                } elseif ($racing_racers == 'racing_racers_3' && $resultExisting->racing_racers_3 === null) {
                    $resultExisting->racing_racers_3 = $racer;
                    $resultExisting->racing_racers_3_status = $status;
                    $resultExisting->save();
                }
            } else {
                $race = new RacingResult();
                $race->racing_categories_id = $racing_categories;
                $race->racing_tracks_id = $racing_track;
                $race->racings_id = $races;
                if ($racing_racers == 'racing_racers_1') {
                    $race->racing_racers_1 = $racer;
                    $race->racing_racers_1_status = $status;
                } elseif ($racing_racers == 'racing_racers_2') {
                    $race->racing_racers_2 = $racer;
                    $race->racing_racers_2_status = $status;
                } elseif ($racing_racers == 'racing_racers_3') {
                    $race->racing_racers_3 = $racer;
                    $race->racing_racers_3_status = $status;
                }
                $race->save();
            }

            $slots = range(1, 20); // 20 follow max slot number
            foreach ($slots as $slot) {
                $slotColumnName = "slot_" . $slot;
                if ($checkRacer->$slotColumnName === null) {
                    $checkRacer->$slotColumnName = $status;
                    $checkRacer->save();
                    break;
                }
            }
            $status = true;
            $resultSubmited = $resultExisting;
            $checkSubmited = $racesComplete;
        } else {
            $status = false;
            $resultSubmited = 'Race is complete';
            $checkSubmited = 'Race is complete';
        }

        return response()->json([
            'status' => $status,
            'result_existing' => $resultSubmited,
            'check_racer' => $checkSubmited
        ]);
    }

    public function completeReport(Request $request)
    {
        $raceID = $request->input('id');
        $race = Racing::findOrFail($raceID);

        $startTime = Carbon::parse($race->created_at);
        $endTime = Carbon::now();
        $durationInSeconds = $endTime->diffInSeconds($startTime);
        $duration = gmdate("H:i:s", $durationInSeconds);

        $resultExisting = RacingResult::where('racings_id', $raceID)->first();
        if ($resultExisting) {
            $race->update([
                'status'          => true,
                'racing_duration' => $duration
            ]);

            return response()->json([
                'status' => true,
                'redirect' => route('apps.event-mhx-cup.races.index'),
            ]);
        }
        return response()->json([
            'status' => false
        ]);
    }

    public function racingDay()
    {
        return view('apps.mhx-cup.racing.index', [
            'racing' => Racing::all()
        ]);
    }

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

    public function startRoundeRace(Request $request)
    {

        $data = [
            'category_id' => $request->input('category_id'),
            'track_id'    => $request->input('track_id'),
            'racer_id_1'  => $request->input('racer_id_1'),
            'racer_id_2'  => $request->input('racer_id_2'),
            'racer_id_3'  => $request->input('racer_id_3'),
        ];
        Session::put('data', $data);

        return response()->json([
            'status' => true,
            'redirect' => route('apps.event-mhx-cup.raceForm'),
        ]);
    }

    public function raceForm(Request $request)
    {
        $data = Session::get('data');
        $category_id = RacingCategory::findOrFail($data['category_id']);
        $track_id    = RacingTrack::findOrFail($data['track_id']);
        $racer_id_1 = RacingRacers::findOrFail($data['racer_id_1']);
        $racer_id_2 = RacingRacers::findOrFail($data['racer_id_2']);
        $racer_id_3 = RacingRacers::findOrFail($data['racer_id_3']);

        return view('apps.mhx-cup.score.create', [
            'category_id' => $category_id,
            'track_id'    => $track_id,
            'racer_id_1'  => $racer_id_1,
            'racer_id_2'  => $racer_id_2,
            'racer_id_3'  => $racer_id_3,
        ]);
    }

}
