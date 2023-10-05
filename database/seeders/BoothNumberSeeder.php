<?php

namespace Database\Seeders;

use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
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

        for ($i = 1; $i <= 16; $i++) {
            $numbers[] = [
                'section_id'    => $camping_exhibition_zone->id,
                'booth_number'  => 'MH' . str_pad($i, 2, '0', STR_PAD_LEFT), // This will generate MH01, MH02, ..., MH16
                'description'   => null,
                'status'        => false,
            ];
        }

        for ($i = 1; $i <= 25; $i++) {
            $numbers[] = [
                'section_id'    => $camping_exhibition_zone->id,
                'booth_number'  => 'FH' . str_pad($i, 2, '0', STR_PAD_LEFT), // This will generate MH01, MH02, ..., MH16
                'description'   => null,
                'status'        => false,
            ];
        }

        for ($i = 1; $i <= 17; $i++) {
            $numbers[] = [
                'section_id'    => $fishing_exhibition_zone->id,
                'booth_number'  => 'FH' . str_pad($i, 2, '0', STR_PAD_LEFT), // This will generate MH01, MH02, ..., MH16
                'description'   => null,
                'status'        => false,
            ];
        }

        for ($i = 1; $i <= 26; $i++) {
            $numbers[] = [
                'section_id'    => $fishing_exhibition_zone->id,
                'booth_number'  => 'NH' . str_pad($i, 2, '0', STR_PAD_LEFT), // This will generate MH01, MH02, ..., MH16
                'description'   => null,
                'status'        => false,
            ];
        }

        BoothNumber::insert($numbers);
    }
}
