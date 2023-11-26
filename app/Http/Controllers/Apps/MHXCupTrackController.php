<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class MHXCupTrackController extends Controller
{
    protected string $view = 'apps.mhx-cup.tracks.';
    protected string $route = 'apps.event-mhx-cup.tracks.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete MHX Cup Track!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'tracks' => RacingTrack::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create', [
            'track' => new RacingTrack(),
            'categories' => RacingCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $track = new RacingTrack();
        $track->saveRacingTrack($track, $request);
        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
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
        $track = RacingTrack::findOrFail($id);
        return view($this->view.'edit', [
            'categories' => RacingCategory::all(),
            'track' => $track
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $track = RacingTrack::findOrFail($id);
        $track->saveRacingTrack($track, $request);
        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $track = RacingTrack::findOrFail($id);
        File::delete($track->track_layouts);
        $track->delete();
        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
