<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\BoothType;
use App\Services\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            'table' => 'required|integer',
            'chair' => 'required|integer',
            'sso' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $category = new BoothType();
        if ($request->hasFile('layout_plan')) {
            $boothCategoryImge = ImageUploader::uploadSingleImage($request->file('layout_plan'), 'assets/images', 'layout_plan');;
        } else {
            $boothCategoryImge = $category->image;
        }

        if ($request->hasFile('image')) {
            $image = ImageUploader::uploadSingleImage($request->file('image'), 'assets/images', 'layout_plan');;
        } else {
            $image = $category->image;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;

        $category->image = $image;
        $category->layout_plan = $boothCategoryImge;
        $category->table = $request->table;
        $category->chair = $request->chair;
        $category->sso = $request->sso;
        $category->price = $request->price;
        $category->save();

        $numbers = $request->input('numbers', []);
        $boothDescriptions = $request->input('booth_desp', []);

        foreach ($numbers as $index => $number) {
            $boothNumber = new BoothNumber();
            $boothNumber->category_id = $category->id;
            $boothNumber->name = $number;
            $boothNumber->slug = Str::slug($number);
            $boothNumber->description = $boothDescriptions[$index];
            $boothNumber->status = false;
            $boothNumber->save();
        }

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

        $numbers = $request->input('numbers', []);
        $boothDescriptions = $request->input('booth_desp', []);

        foreach ($numbers as $index => $number) {
            $boothNumber = new BoothNumber();
            $boothNumber->category_id = $category->id;
            $boothNumber->name = $number;
            $boothNumber->slug = Str::slug($number);
            $boothNumber->description = $boothDescriptions[$index];
            $boothNumber->status = false;
            $boothNumber->save();
        }

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
