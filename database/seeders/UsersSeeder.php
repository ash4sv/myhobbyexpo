<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Schema::disableForeignKeyConstraints();
//        User::truncate();
//        Schema::enableForeignKeyConstraints();

        $users = [
//            [
//                'name' => 'Systems Administrator',
//                'email' => 'sysadmin@myhobbyexpo.com',
//                'email_verified_at' => now(),
//                'password' => Hash::make('P@ssw0rd!@3'),
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Super Administrator',
//                'email' => 'masteradmin@myhobbyexpo.com',
//                'email_verified_at' => now(),
//                'password' => Hash::make('Fido@8182'),
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'Administrator',
//                'email' => 'admin@myhobbyexpo.com',
//                'email_verified_at' => now(),
//                'password' => Hash::make('admin1234'),
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
            [
                'name' => 'Mr. Totet',
                'email' => 'totet@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ms. Shazz',
                'email' => 'shazz@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ms. Ieya',
                'email' => 'ieya@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ms. Nad',
                'email' => 'nad@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MCGA Rep.',
                'email' => 'mcgarep@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mr. Yus YUMA',
                'email' => 'yuma@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mr. Arif',
                'email' => 'araf@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PRE-Reg Online',
                'email' => 'preregonline@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mr. Amir Hamzah',
                'email' => 'amirhamzah@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ms. Hana',
                'email' => 'hana@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $agent = Role::where('name', 'agent')->first();

        foreach ($users as $user) {
            User::create($user)->assignRole($agent);
        }

//        $system = Role::where('name', 'system')->first();
//        $master = Role::where('name', 'master')->first();
//        $admin  = Role::where('name', 'admin')->first();
//
//        $systemUser = User::where('email', '=', 'sysadmin@myhobbyexpo.com')->first();
//        $masterUser = User::where('email', '=', 'masteradmin@myhobbyexpo.com')->first();
//        $adminUser = User::where('email', '=', 'admin@myhobbyexpo.com')->first();
//
//        $systemUser->assignRole($system->name);
//        $masterUser->assignRole($master->name);
//        $adminUser->assignRole($admin->name);
    }
}
