<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Booth;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoothController extends Controller
{
    protected $view     = 'apps.exhibition.booth.';
    protected $route    = 'apps.exhibition.booth.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'booths' => Booth::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create', [
            'booth'     => new Booth(),
            'sections'  => Section::all(),
            'numbers'   => BoothNumber::all(),
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view($this->view.'edit', [
            'booth'           => Booth::findOrFail($id),
            'sections'        => Section::all(),
            'numbers'         => BoothNumber::all(),
            'boothSelected' => DB::table("booth_booth_number")->where("booth_booth_number.booth_id", $id)->pluck('booth_booth_number.booth_number_id','booth_booth_number.booth_number_id')->all()
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
        //
    }
}
