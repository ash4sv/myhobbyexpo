<?php

namespace Database\Seeders;

use App\Models\Apps\BoothType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BoothTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        BoothType::truncate();
        Schema::enableForeignKeyConstraints();

        $types = [
            // A

            [
                'image' => 'assets/images/premium.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Premium',
                'slug' => 'premium',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '250.00',
            ],
            [
                'image' => 'assets/images/normal.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Normal',
                'slug' => 'normal',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/bazaar.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Bazaar',
                'slug' => 'bazaar',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/normal.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Normal',
                'slug' => 'normal',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/bazaar.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Bazaar',
                'slug' => 'bazaar',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],

            // B


            [
                'image' => 'assets/images/normal.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Normal',
                'slug' => 'normal',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/bazaar.png',
                'layout_plan' => 'assets/images/layout-1@4x-50.jpg',
                'name' => 'Bazaar',
                'slug' => 'bazaar',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],

            // C

            [
                'image' => 'assets/images/hall-c-01.png',
                'layout_plan' => 'assets/images/camping.png',
                'name' => 'Camping',
                'slug' => 'camping',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '1700.00',
            ],
            [
                'image' => 'assets/images/hall-c-02.png',
                'layout_plan' => 'assets/images/fishing.png',
                'name' => 'Fishing',
                'slug' => 'fishing',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '1700.00',
            ],

            // D

            [
                'image' => 'assets/images/hall-d-01.png',
                'layout_plan' => 'assets/images/map-hall-d2_concourse.png',
                'name' => 'Concourse',
                'slug' => 'concourse',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/hall-d-02.png',
                'layout_plan' => 'assets/images/map-hall-d2_exotic.png',
                'name' => 'Exotic',
                'slug' => 'exotic',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
            [
                'image' => 'assets/images/hall-d-03.png',
                'layout_plan' => 'assets/images/map-hall-d2_aqua.png',
                'name' => 'Aqua',
                'slug' => 'aqua',
                'description' => '',
                'ffe_table' => 1,
                'ffe_chair' => 2,
                'ffe_sso' => 2,
                'price' => '100.00',
            ],
        ];

        foreach ($types as $type) {
            BoothType::create($type);
        }
    }
}



