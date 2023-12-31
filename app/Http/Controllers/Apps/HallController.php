<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Hall;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HallController extends Controller
{
    protected $view     = 'apps.exhibition.hall.';
    protected $route    = 'apps.exhibition.hall.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('hall-access');
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'halls' => Hall::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('hall-create');
        return view($this->view.'create', [
            'hall' => new Hall(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('hall-create');
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'image'         => 'required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp|max:100000'
        ]);

        $hall = new Hall();
        $hall->saveHall($hall, $request);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route('apps.exhibition.hall.edit', $hall);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('hall-show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('hall-edit');
        return view($this->view.'edit', [
            'hall' => Hall::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('hall-edit');
        $hall = Hall::findOrFail($id);
        $hall->saveHall($hall, $request);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hall-delete');
        $hall = Hall::findOrFail($id);
        $hall->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
