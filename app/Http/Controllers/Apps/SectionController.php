<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $view     = 'apps.exhibition.section.';
    protected $route    = 'apps.exhibition.section.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view($this->view.'create', [
            'section' => new Section(),
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
        $section = Section::findOrFail($id);
        return view($this->view.'edit', [
            'section' => $section
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
