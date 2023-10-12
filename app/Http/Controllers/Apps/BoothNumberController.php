<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BoothNumberController extends Controller
{
    protected $view     = 'apps.exhibition.booth-number.';
    protected $route    = 'apps.exhibition.booth-number.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('booth-number-access');
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'booths' => BoothNumber::all(),
            'zones'  => DB::table('sections')->pluck('name', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('booth-number-create');
        return view($this->view.'create', [
            'zones' => DB::table('sections')->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('booth-number-create');
        $request->validate([
            'booth_number.*' => 'required'
        ]);

        foreach ($request->booth_number as $key => $boothNumber) {
            BoothNumber::create([
                'booth_number' => $boothNumber,
                'section_id'   => $request->zone[$key],
                'description'  => $request->description[$key],
                'status'       => false
            ]);
        }

        $zones = DB::table('sections')->pluck('name', 'id');
        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return view($this->view.'create', [
            'zones' => $zones
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('booth-number-show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('booth-number-edit');
        $number = BoothNumber::findOrFail($id);
        return view($this->view.'edit', [
            'number' => $number,
            'zones'  => DB::table('sections')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('booth-number-edit');
        $number = BoothNumber::findOrFail($id);
        $number->fill([
            'section_id'    => $request->zone,
            'booth_number'  => $request->booth_number,
            'description'   => $request->description,
        ]);
        $number->update();

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'edit', $number);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('booth-number-delete');
        $number = BoothNumber::findOrFail($id);
        $number->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
