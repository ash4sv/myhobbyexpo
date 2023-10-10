<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    private string $view = 'apps.acl.roles.';
    private string $route = 'apps.acl.roles.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('role-access');
        $title = 'Delete Roles!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('role-create');
        return view($this->view.'create', [
            'role' => new Role(),
            'permissions' => DB::table('permissions')->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('role-create');
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('role-show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('role-edit');
        return view($this->view.'edit', [
            'role' => Role::findOrFail($id),
            'permissions' => DB::table('permissions')->pluck('name', 'id'),
            'rolePermissions' => DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('role-edit');
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('role-delete');
        $role = Role::findOrFail($id);
        $role->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
