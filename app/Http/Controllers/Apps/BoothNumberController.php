<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\BoothType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BoothNumberController extends Controller
{
    protected $view = 'apps.exhibitor.booths.';
    protected $route = 'apps.exhibitor.booths.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Booths Numbers!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'numbers' => BoothNumber::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create', [
            'categories' => BoothType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|integer',
            'name.*' => 'required|string',
            'booth_desp.*' => '',
        ]);

        foreach ($validatedData['name'] as $key => $name) {
            $description = $validatedData['booth_desp'][$key];

            BoothNumber::create([
                'category_id' => $request->category,
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description,
                'status' => false,
            ]);
        }

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
        return view($this->view.'edit', [
            'categories' => BoothType::all(),
            'booth' => BoothNumber::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booth = BoothNumber::findOrFail($id);


        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booth = BoothNumber::findOrFail($id);
        $booth->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
