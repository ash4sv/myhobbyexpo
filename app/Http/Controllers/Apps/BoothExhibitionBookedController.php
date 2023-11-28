<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothExhibitionBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BoothExhibitionBookedController extends Controller
{

    protected $view = 'apps.booth-booked.';
    protected $route = 'apps.booth-booked.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Booked!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

//        $user = Auth::user();
//        return $user->roles;
//        if ($user->hasrole(['sysadmin', 'master', 'agent'])) {
//
//        }
        $booths = BoothExhibitionBooked::all();
        return view($this->view.'index', [
            'booths' => $booths
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
        $booths = BoothExhibitionBooked::findOrFail($id);
        $boothData = json_decode($booths->inv_description, true);

        $itemsToDisplay = [
            'add_table', 'add_chair', 'add_sso', 'add_sso_15amp', 'add_steel_barricade', 'add_shell_scheme_barricade',
        ];

        return view($this->view.'show', [
            'booths' => $booths,
            'boothData' => $boothData,
            'itemsToDisplay' => $itemsToDisplay
        ]);
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
        $booked = BoothExhibitionBooked::findOrFail($id);
        $booked->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
