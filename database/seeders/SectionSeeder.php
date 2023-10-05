<?php

namespace Database\Seeders;

use App\Models\Apps\Hall;
use App\Models\Apps\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();

        $hall_a = Hall::where('name', 'Hall A')->first();
        $hall_b = Hall::where('name', 'Hall B')->first();
        $hall_c = Hall::where('name', 'Hall C')->first();
        $hall_d = Hall::where('name', 'Hall D')->first();


        $sections = [
            [
                'hall_id'     => $hall_a->id,
                'name'        => 'Hobby Bazaar Zone',
                'slug'        => 'hobby-bazaar-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-a-01.png',
                'layout'      => 'assets/images/map-hall-a_hobby-bazaar.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_a->id,
                'name'        => 'Hobby Show-Off Zone',
                'slug'        => 'hobby-show-off-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-a-02.png',
                'layout'      => 'assets/images/map-hall-a_hobby-show-off.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_a->id,
                'name'        => 'Hobby E-Sport X PC Fest Zone',
                'slug'        => 'hobby-e-sport-x-pc-fest-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-a-03.png',
                'layout'      => 'assets/images/map-hall-a_esport-pc-fest.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_a->id,
                'name'        => 'Creative Art Zone',
                'slug'        => 'creative-art-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-a-04.png',
                'layout'      => 'assets/images/map-hall-a_creative-art.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_a->id,
                'name'        => 'Vintage Bazaar Zone',
                'slug'        => 'vintage-bazaar-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-a-05.png',
                'layout'      => 'assets/images/map-hall-a_vintage-bazaar.png',
                'status'      => true,
            ],

            //=================================================================

            [
                'hall_id'     => $hall_b->id,
                'name'        => 'MHX Cup Mini 4WD Registration',
                'slug'        => 'mhx-cup-mini-4wd-registration',
                'description' => null,
                'poster'      => 'assets/images/hall-b-01.png',
                'layout'      => 'assets/images/',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_b->id,
                'name'        => 'Street Market Zone',
                'slug'        => 'street-market-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-b-02.png',
                'layout'      => 'assets/images/',
                'status'      => true,
            ],

            //=================================================================

            [
                'hall_id'     => $hall_c->id,
                'name'        => 'Camping Exhibition Zone',
                'slug'        => 'camping-exhibition-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-c-01.png',
                'layout'      => 'assets/images/map-hall-c-camping.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_c->id,
                'name'        => 'Fishing Exhibition Zone',
                'slug'        => 'fishing-exhibition-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-c-02.png',
                'layout'      => 'assets/images/map-hall-c-fishing.png',
                'status'      => true,
            ],

            //=================================================================

            [
                'hall_id'     => $hall_d->id,
                'name'        => 'Concourse',
                'slug'        => 'concourse',
                'description' => null,
                'poster'      => 'assets/images/hall-d-01.png',
                'layout'      => 'assets/images/map-hall-d2_concourse.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_d->id,
                'name'        => 'Exotic Zone',
                'slug'        => 'exotic-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-d-02.png',
                'layout'      => 'assets/images/map-hall-d2_exotic.png',
                'status'      => true,
            ],
            [
                'hall_id'     => $hall_d->id,
                'name'        => 'Aqua Zone',
                'slug'        => 'aqua-zone',
                'description' => null,
                'poster'      => 'assets/images/hall-d-03.png',
                'layout'      => 'assets/images/map-hall-d2_aqua.png',
                'status'      => true,
            ],
        ];


        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
