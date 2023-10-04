<?php

namespace Database\Seeders;

use App\Models\Apps\Booth;
use App\Models\Apps\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BoothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //section_id
        //booth_number_id
        //booth_type
        //normal_price
        //early_bird_price
        //early_bird_expiry_date
        //status

        Schema::disableForeignKeyConstraints();
        Booth::truncate();
        Schema::enableForeignKeyConstraints();

        $hobby_bazaar_zone = Section::where('name', '=', 'Hobby Bazaar Zone')->first();
        $hobby_show_off_zone = Section::where('name', '=', 'Hobby Show-Off Zone')->first();
        $hobby_e_sport_x_pc_fest_zone = Section::where('name', '=', 'Hobby E-Sport X PC Fest Zone')->first();
        $creative_art_zone = Section::where('name', '=', 'Creative Art Zone')->first();
        $vintage_bazaar_zone = Section::where('name', '=', 'Vintage Bazaar Zone')->first();
        $mhx_cup_mini_4wd_registration = Section::where('name', '=', 'MHX Cup Mini 4WD Registration')->first();
        $street_market_zone = Section::where('name', '=', 'Street Market Zone')->first();
        $camping_exhibition_zone = Section::where('name', '=', 'Camping Exhibition Zone')->first();
        $fishing_exhibition_zone = Section::where('name', '=', 'Fishing Exhibition Zone')->first();
        $concourse = Section::where('name', '=', 'Concourse')->first();
        $exotic_zone = Section::where('name', '=', 'Exotic Zone')->first();
        $aqua_zone = Section::where('name', '=', 'Aqua Zone')->first();

        $booths = [
            // $camping_exhibition_zone


            [
                'section_id'                => $camping_exhibition_zone->id,
                'booth_type'                => 'Premium Space (6m x 6m) - Light Yellow',
                'normal_price'              => '3000',
                'early_bird_price'          => '2700',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
            [
                'section_id'                => $camping_exhibition_zone->id,
                'booth_type'                => 'Normal Space (6m x 6m) - Light Green',
                'normal_price'              => '2500',
                'early_bird_price'          => '2200',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
            [
                'section_id'                => $camping_exhibition_zone->id,
                'booth_type'                => 'Normal booth With Shell Scheme (3m x 3m) - Light Blue',
                'normal_price'              => '1700',
                'early_bird_price'          => '1300',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
            [
                'section_id'                => $camping_exhibition_zone->id,
                'booth_type'                => 'Bare Space (3m x 3m) - Pink',
                'normal_price'              => '800',
                'early_bird_price'          => '700',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],

            // $fishing_exhibition_zone


            [
                'section_id'                => $fishing_exhibition_zone->id,
                'booth_type'                => 'Premium Space (6m x 6m) - ',
                'normal_price'              => '3000',
                'early_bird_price'          => '2700',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
            [
                'section_id'                => $fishing_exhibition_zone->id,
                'booth_type'                => 'Normal Space (6m x 6m) - ',
                'normal_price'              => '2500',
                'early_bird_price'          => '2200',
                'early_bird_expiry_date'    => '231031',
            'status'                    => true,
            ],
            [
                'section_id'                => $fishing_exhibition_zone->id,
                'booth_type'                => 'Normal booth With Shell Scheme (3m x 3m) - ',
                'normal_price'              => '1500',
                'early_bird_price'          => '1300',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
            [
                'section_id'                => $fishing_exhibition_zone->id,
                'booth_type'                => 'Bare Space (3m x 3m) - ',
                'normal_price'              => '800',
                'early_bird_price'          => '700',
                'early_bird_expiry_date'    => '231031',
                'status'                    => true,
            ],
        ];

        foreach ($booths as $booth) {
            Booth::create($booth);
        }
    }
}
