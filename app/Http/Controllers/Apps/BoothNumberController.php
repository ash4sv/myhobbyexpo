<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\BoothNumber;
use Illuminate\Http\Request;
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
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'booths' => BoothNumber::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->booth_number as $key => $boothNumber) {
            BoothNumber::create([
                'booth_number' => $boothNumber,
                'description' => $request->description[$key],
                'status' => false
            ]);
        }

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return view($this->view.'create');
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
        $number = BoothNumber::findOrFail($id);
        return view($this->view.'edit', [
            'number' => $number
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $number = BoothNumber::findOrFail($id);
        $number->fill([
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
        $number = BoothNumber::findOrFail($id);
        $number->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
