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
            ]
        ];

        foreach ($types as $type) {
            BoothType::create($type);
        }
    }
}
