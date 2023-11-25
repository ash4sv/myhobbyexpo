<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Hall;
use App\Models\Apps\Section;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    protected $view     = 'apps.exhibition.section.';
    protected $route    = 'apps.exhibition.section.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('zone-access');
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'sections' => Section::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('zone-create');
        return view($this->view.'create', [
            'section' => new Section(),
            'halls' => Hall::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('zone-create');
        $request->validate([
            'poster'        => 'required',
            'layout'        => 'required',
            'hall'          => 'required',
            'name'          => 'required',
            'description'   => '',
            'status'        => '',
            'coming_soon'   => '',
        ]);

        $section = new Section();
        $section->saveSection($section, $request);
        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'edit', $section);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = Section::findOrFail($id);
        return view($this->view.'show', [
            'section' => $section
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('zone-edit');
        $halls = Hall::all();
        $section = Section::findOrFail($id);
        return view($this->view.'edit', [
            'section' => $section,
            'halls'   => $halls
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('zone-edit');
        $section = Section::findOrFail($id);
        $section->saveSection($section, $request);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('zone-delete');
        $section = Section::findOrFail($id);
        $section->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
