<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    private string $view = 'apps.acl.permissions.';
    private string $route = 'apps.acl.permissions.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Permissions!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'permissions' => Permission::all(),
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
        foreach($request->permissions as $permission){
            Permission::create(str_replace(' ', '-', $permission));
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
            'permission' => Permission::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->fill(['name' => str_replace( ' ', '-',$request->permission)]);
        $permission->update();

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Permission::findOrFail($id);
        $role->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
