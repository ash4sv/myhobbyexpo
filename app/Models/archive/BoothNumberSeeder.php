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

        $camping = BoothType::where('name', '=', 'Camping')->first();
        $fishing = BoothType::where('name', '=', 'Fishing')->first();

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

            // c

            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH01',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH02',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH03',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH04',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH05',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH06',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH07',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH08',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH09',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH10',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH11',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH12',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH13',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH14',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $camping->id,
                'price' => '2500',
                'early_bird_price' => '2200',
                'endDate' => null,
                'type' => 'Normal',
                'name' => 'MH15',
                'slug' => 'mh',
                'description' => '',
                'status' => false,
            ],

            // C 2


            [
                'category_id' => $fishing->id,
                'name' => 'FH01',
                'slug' => 'fh01',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH02',
                'slug' => 'fh02',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH03',
                'slug' => 'fh03',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH04',
                'slug' => 'fh04',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH05',
                'slug' => 'fh05',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH06',
                'slug' => 'fh06',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH07',
                'slug' => 'fh07',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH08',
                'slug' => 'fh08',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH09',
                'slug' => 'fh09',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH10',
                'slug' => 'fh10',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH11',
                'slug' => 'fh11',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH12',
                'slug' => 'fh12',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH13',
                'slug' => 'fh13',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH14',
                'slug' => 'fh14',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH15',
                'slug' => 'fh15',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH16',
                'slug' => 'fh16',
                'description' => '',
                'status' => false,
            ],
            [
                'category_id' => $fishing->id,
                'name' => 'FH17',
                'slug' => 'fh17',
                'description' => '',
                'status' => false,
            ],
        ];

        foreach ($numbers as $number) {
            BoothNumber::create($number);
        }
    }
}
