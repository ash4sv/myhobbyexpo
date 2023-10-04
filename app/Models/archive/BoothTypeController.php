<?php

namespace App\Models\archive;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BoothTypeController extends Controller
{
    protected $view = 'apps.exhibitor.category.';
    protected $route = 'apps.exhibitor.category.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Roles!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'categories' => BoothType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create', [
            'category' => new BoothType()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'layout_plan' => 'required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp|max:2048',
            'name' => 'required',
            'description' => 'required',
            'ffe_table' => 'required|integer',
            'ffe_chair' => 'required|integer',
            'ffe_sso' => 'required|integer',
            'price' => 'required|regex:/^\\d+(\\.\\d{1,2})?$/',
        ]);

        $category = new BoothType();
        $category->saveBoothType($category, $request);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route('apps.exhibitor.category.edit', $category->id);
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
        $category = BoothType::where('id', $id)->first();

        return view($this->view.'edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = BoothType::findOrFail($id);
        $category->saveBoothType($category, $request);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BoothType::findOrFail($id);
        $category->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
