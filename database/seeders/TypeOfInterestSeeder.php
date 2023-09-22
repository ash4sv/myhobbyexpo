<?php

namespace Database\Seeders;

use App\Models\Apps\TypeOfInterest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeOfInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfInterest::truncate();

        $interests = [
            [
                'slug' => '',
                'image' => 'assets/images/flea-market.png',
                'name' => 'FLEA MARKET',
                'description' => '',
            ],
            [
                'slug' => '',
                'image' => 'assets/images/hobby-group-zone.png',
                'name' => 'HOBBY GROUP ZONE',
                'description' => '',
            ],
            [
                'slug' => '',
                'image' => 'assets/images/activity-zone.png',
                'name' => 'ACTIVITY ZONE',
                'description' => '',
            ],
        ];

        foreach ($interests as $interest) {
            TypeOfInterest::create([
                'slug' => Str::slug($interest['name']),
                'image' => $interest['image'],
                'name' => $interest['name'],
                'description'  => $interest['description'],
            ]);
        }
    }
}
