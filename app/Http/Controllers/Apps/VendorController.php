<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\Vendor;
use Illuminate\Http\Request;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
use App\Models\Apps\Hall;
use RealRashid\SweetAlert\Facades\Alert;

class VendorController extends Controller
{
    protected $view = 'apps.vendor.';
    protected string $route = 'apps.vendor.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hall = Hall::all();
        $section = Section::all();
        $boothNumbers = BoothNumber::all();

        return view($this->view . 'create', [
            'vendors' => new Vendor(),
            'boothNumbers' => $boothNumbers,
            'hall' => $hall,
            'section' => $section,
        ]);
    }

    public function getSections($hallId)
    {
        $sections = Section::where('hall_id', $hallId)->get();

        return view('apps.vendor.ajaxsection', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required',
            'roc_rob' => 'required',
            'email' => 'email',
            'pic_name' => 'required',
            'phone_num' => 'required',
            'social_media' => 'array',
            'website' => 'required',
        ]);

        $validatedData['social_media'] = json_encode($validatedData['social_media']);
        $vendor = Vendor::create($validatedData);

        $vendor->registeredBooth()->create([
            'booth_number' => $request->input('booth_register'),
        ]);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return view($this->view . 'index', [
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return view($this->view.'show', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}