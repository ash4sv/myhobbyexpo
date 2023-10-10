<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Booth;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BoothController extends Controller
{
    protected $view     = 'apps.exhibition.booth.';
    protected $route    = 'apps.exhibition.booth.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('booth-access');
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
        $this->authorize('booth-create');
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
        $this->authorize('booth-create');
        $request->validate([
            'section'                => 'required|numeric',
            'booth_type'             => 'required|string',
            'normal_price'           => 'required|numeric',
            'early_bird_price'       => 'required|numeric',
            'early_bird_expiry_date' => 'required|date',
            'status'                 => '',
        ]);

        $booth = new Booth();
        $booth->saveBooth($booth, $request);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('booth-show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('booth-edit');
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
        $this->authorize('booth-edit');
        $booth = Booth::findOrFail($id);
        $booth->saveBooth($booth, $request);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'edit', $booth);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('booth-delete');
        $booth = Booth::findOrFail($id);
        $booth->boothNumbers()->detach();
        $booth->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
