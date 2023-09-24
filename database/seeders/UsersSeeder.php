<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Systems Administrator',
                'email' => 'sysadmin@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('P@ssw0rd!@3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Super Administrator',
                'email' => 'masteradmin@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Fido@8182'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@myhobbyexpo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
