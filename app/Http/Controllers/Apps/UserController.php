<?php

namespace App\Http\Controllers\Apps;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private string $view = 'apps.acl.users.';
    private string $route = 'apps.acl.users.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('user-access');
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('user-create');
        return view($this->view.'create', [
            'user' => new User(),
            'roles' => DB::table('roles')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('user-create');
        $user = new CreateNewUser();
        $user->create($request->only(['name', 'email', 'password', 'password_confirmation']))->assignRole($request->role);

        Alert::success('Successfully saved!', 'Record has been saved successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('user-show');
        return view($this->view.'show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('user-edit');
        return view($this->view.'edit', [
            'user' => User::findOrFail($id),
            'roles' => DB::table('roles')->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('user-edit');
        $role = Role::where('name', $request->role)->first();
        $user = User::findOrFail($id);
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
        ])->update();
        $user->syncRoles($role);

        Alert::success('Successfully updated!', 'Record has been updated successfully');
        return redirect()->route($this->route.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('user-delete');
        $user = User::findOrFail($id);
        $user->delete();

        Alert::warning('Successfully deleted!', 'Record has been deleted successfully');
        return redirect()->route($this->route.'index');
    }
}
