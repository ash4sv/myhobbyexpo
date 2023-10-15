<?php

namespace Database\Seeders;

use App\Models\Apps\Booth;
use App\Models\Apps\BoothSpecialPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BoothSpecialPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        BoothSpecialPrice::truncate();
        Schema::enableForeignKeyConstraints();

        $booth = Booth::where('booth_type', 'HALL A Hobby Show-Off Zone Bare Space (2m x 2.5m) - Green Lime')->first();

        $prices = [
            [
                'booth_id'    => $booth->id,
                'min'         => 1,
                'max'         => 2,
                'price'       => 125.00,
                'description' => '',
            ],
            [
                'booth_id'    => $booth->id,
                'min'         => 3,
                'max'         => 9,
                'price'       => 100.00,
                'description' => '',
            ],
            [
                'booth_id'    => $booth->id,
                'min'         => 10,
                'max'         => null,
                'price'       => 85.00,
                'description' => '',
            ],
        ];

        foreach ($prices as $price) {
            BoothSpecialPrice::insert($price);
        }
    }
}
