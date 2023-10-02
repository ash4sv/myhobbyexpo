<?php

namespace Database\Seeders;

use App\Models\Apps\BoothNumber;
use App\Models\Apps\BoothType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BoothNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        BoothNumber::truncate();
        Schema::enableForeignKeyConstraints();

        $premium = BoothType::where('name', '=', 'Premium')->first();
        $normal = BoothType::where('name', '=', 'Normal')->first();
        $bazaar = BoothType::where('name', '=', 'Bazaar')->first();

        $numbers = [
            [
                'category_id' => $premium->id,
                'name' => 'P-AH-1',
                'slug' => 'p-ah-1',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $premium->id,
                'name' => 'P-AH-2',
                'slug' => 'p-ah-2',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $normal->id,
                'name' => 'N-AH-1',
                'slug' => 'n-ah-1',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $normal->id,
                'name' => 'N-AH-2',
                'slug' => 'n-ah-2',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $bazaar->id,
                'name' => 'B-AH-1',
                'slug' => 'b-ah-1',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $bazaar->id,
                'name' => 'B-AH-2',
                'slug' => 'b-ah-2',
                'description' => '',
                'status' => false,
            ],
        ];

        foreach ($numbers as $number) {
            BoothNumber::create($number);
        }
    }
}
