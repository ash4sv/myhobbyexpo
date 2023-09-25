<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $permissions = [
            'dashboard-access',

            'general-access',

            'system-access',
            'acl-access',

            'pre-register-access',
            'pre-register-create',
            'pre-register-edit',
            'pre-register-show',
            'pre-register-delete',

            'user-access',
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',

            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'role-access',

            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',
            'permission-access',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ]);
        }

        $roles =[
            'system',
            'master',
            'admin',
            'guest',
        ];

        foreach ($roles as $role){
            Role::create([
                'name' => $role,
            ]);
        }

        $system = Role::where('name', 'system')->first();
        $master = Role::where('name', 'master')->first();
        $admin  = Role::where('name', 'admin')->first();
        $guest  = Role::where('name', 'guest')->first();

        foreach ($permissions as $permission){
            $system->givePermissionTo($permission);
        }

        foreach ($permissions as $permission){
            $master->givePermissionTo($permission);
        }

        $permissionsAdmin = [
            'dashboard-access',

            'general-access',

            'pre-register-access',
            'pre-register-create',
            'pre-register-edit',
            'pre-register-show',

            'user-create',
            'user-edit',
            'user-show',
            'user-access',

            'role-create',
            'role-edit',
            'role-show',
            'role-access',

            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-access',
        ];

        foreach ($permissionsAdmin as $item){
            $master->givePermissionTo($item);
        }
    }
}
