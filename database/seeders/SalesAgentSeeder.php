<?php

namespace Database\Seeders;

use App\Models\Apps\Hall;
use App\Models\Apps\SalesAgent;
use App\Models\Apps\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SalesAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        SalesAgent::truncate();
        Schema::enableForeignKeyConstraints();

        $hall_a = Hall::where('name', 'Hall A')->first();
        $hall_b = Hall::where('name', 'Hall B')->first();
        $hall_c = Hall::where('name', 'Hall C')->first();
        $hall_d = Hall::where('name', 'Hall D')->first();

        $hobby_bazaar_zone              = Section::where('name', '=', 'Hobby Bazaar Zone')->first();
        $hobby_show_off_zone            = Section::where('name', '=', 'Hobby Show-Off Zone')->first();
        $hobby_e_sport_x_pc_fest_zone   = Section::where('name', '=', 'Hobby E-Sport X PC Fest Zone')->first();
        $creative_art_zone              = Section::where('name', '=', 'Creative Art Zone')->first();
        $vintage_bazaar_zone            = Section::where('name', '=', 'Vintage Bazaar Zone')->first();
        $mhx_cup_mini_4wd_registration  = Section::where('name', '=', 'MHX Cup Mini 4WD Registration')->first();
        $street_market_zone             = Section::where('name', '=', 'Street Market Zone')->first();
        $camping_exhibition_zone        = Section::where('name', '=', 'Camping Exhibition Zone')->first();
        $fishing_exhibition_zone         = Section::where('name', '=', 'Fishing Exhibition Zone')->first();
        $concourse                      = Section::where('name', '=', 'Concourse')->first();
        $exotic_zone                    = Section::where('name', '=', 'Exotic Zone')->first();
        $aqua_zone                      = Section::where('name', '=', 'Aqua Zone')->first();

        $agents = [
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $camping_exhibition_zone->id,
                'name'       => 'Mr. Rizal',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $camping_exhibition_zone->id,
                'name'       => 'Mr. Sham',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $camping_exhibition_zone->id,
                'name'       => 'Mr. Jimmy',
                'status'     => true,
            ],


            [
                'hall_id'    => $hall_c->id,
                'section_id' => $fishing_exhibition_zone->id,
                'name'       => 'Pak Tam',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $fishing_exhibition_zone->id,
                'name'       => 'Mr. Totet',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $fishing_exhibition_zone->id,
                'name'       => 'Ms. Shazz',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $fishing_exhibition_zone->id,
                'name'       => 'Ms. Ieya',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_c->id,
                'section_id' => $fishing_exhibition_zone->id,
                'name'       => 'Ms. Nad',
                'status'     => true,
            ],


            [
                'hall_id'    => $hall_d->id,
                'section_id' => $concourse->id,
                'name'       => 'Ms. Shazz',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_d->id,
                'section_id' => $concourse->id,
                'name'       => 'Ms. Ieya',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_d->id,
                'section_id' => $concourse->id,
                'name'       => 'Ms. Nad',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_d->id,
                'section_id' => $concourse->id,
                'name'       => 'MCGA Rep.',
                'status'     => true,
            ],


            [
                'hall_id'    => $hall_d->id,
                'section_id' => $exotic_zone->id,
                'name'       => 'Mr. Yus YUMA',
                'status'     => true,
            ],
            [
                'hall_id'    => $hall_d->id,
                'section_id' => $exotic_zone->id,
                'name'       => 'Mr. Arif',
                'status'     => true,
            ],


            [
                'hall_id'    => $hall_d->id,
                'section_id' => $aqua_zone->id,
                'name'       => 'Mr. Yus YUMA',
                'status'     => true,
            ],
        ];


        foreach ($agents as $agent) {
            SalesAgent::create($agent);
        }
    }
}
