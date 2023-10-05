<?php

namespace Database\Seeders;

use App\Models\Apps\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Hall::truncate();
        Schema::enableForeignKeyConstraints();

        $halls = [
            [
                'name'         => 'Hall A',
                'slug'         => 'hall-a',
                'description'  => null,
                'poster'       => 'assets/images/hall-a.png',
                'coming_soon'  => false,
                'status'       => true,
            ],
            [
                'name'         => 'Hall B',
                'slug'         => 'hall-b',
                'description'  => null,
                'poster'       => 'assets/images/hall-b.png',
                'coming_soon'  => false,
                'status'       => true,
            ],
            [
                'name'         => 'Hall C',
                'slug'         => 'hall-c',
                'description'  => null,
                'poster'       => 'assets/images/hall-c.png',
                'coming_soon'  => false,
                'status'       => true,
            ],
            [
                'name'         => 'Hall D',
                'slug'         => 'hall-d',
                'description'  => null,
                'poster'       => 'assets/images/hall-d.png',
                'coming_soon'  => false,
                'status'       => true,
            ],
        ];

        foreach ($halls as $hall) {
            Hall::create($hall);
        }
    }
}
