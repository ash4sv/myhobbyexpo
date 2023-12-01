<?php

namespace Database\Seeders;

use App\Models\Apps\MHXCup\RacingCategory;
use App\Models\Apps\MHXCup\RacingTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RacingTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('racing_categories')->truncate();
        DB::table('racing_tracks')->truncate();
        DB::table('racing_racers')->truncate();
        DB::table('racings')->truncate();
        DB::table('racing_results')->truncate();
        DB::table('racing_score_boards')->truncate();
        Schema::enableForeignKeyConstraints();

        $path = 'assets/upload/';

        $categories = [
            [
                'category_name' => 'Semi-Tech Class A',
                'category_image' => $path . 'mhxc_001.png',
            ],
            [
                'category_name' => 'B-Max Class B',
                'category_image' => $path . 'mhxc_002.png',
            ],
            [
                'category_name' => 'Stock-Car Class C',
                'category_image' => $path . 'mhxc_003.png',
            ],
        ];

        foreach ($categories as $category) {
            RacingCategory::create([
                'slug' => Str::slug($category['category_name']),
                'category_name' => $category['category_name'],
                'category_image' => $category['category_image']
            ]);
        }

        $semitechclassa = RacingCategory::where('category_name', 'Semi-Tech Class A')->first();
        $bmaxclassb = RacingCategory::where('category_name', 'B-Max Class B')->first();
        $stockcarclassc = RacingCategory::where('category_name', 'Stock-Car Class C')->first();

        $tracks = [
            /*[
                'racing_categories_id' => $semitechclassa->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-semi-tech.jpeg',
            ],
            [
                'racing_categories_id' => $semitechclassa->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-semi-tech.jpeg',
            ],
            [
                'racing_categories_id' => $semitechclassa->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-semi-tech.jpeg',
            ],
            [
                'racing_categories_id' => $semitechclassa->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-semi-tech.jpeg',
            ],*/

            [
                'racing_categories_id' => $bmaxclassb->id,
                'track_name' => 'RACE TRACK A',
                'track_layouts' => $path . 'layout-b-max.jpeg',
            ],
            [
                'racing_categories_id' => $bmaxclassb->id,
                'track_name' => 'RACE TRACK B',
                'track_layouts' => $path . 'layout-b-max.jpeg',
            ],
            [
                'racing_categories_id' => $bmaxclassb->id,
                'track_name' => 'RACE TRACK C',
                'track_layouts' => $path . 'layout-b-max.jpeg',
            ],
            [
                'racing_categories_id' => $bmaxclassb->id,
                'track_name' => 'RACE TRACK D',
                'track_layouts' => $path . 'layout-b-max.jpeg',
            ],

            /*[
                'racing_categories_id' => $stockcarclassc->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-stock.jpeg',
            ],
            [
                'racing_categories_id' => $stockcarclassc->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-stock.jpeg',
            ],
            [
                'racing_categories_id' => $stockcarclassc->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-stock.jpeg',
            ],
            [
                'racing_categories_id' => $stockcarclassc->id,
                'track_name' => '',
                'track_layouts' => $path . 'layout-stock.jpeg',
            ],*/
        ];

        foreach ($tracks as $track) {
            $categoryId = $track['racing_categories_id'];

            if (!isset($counters[$categoryId])) {
                $counters[$categoryId] = 1;
            }

            RacingTrack::create([
                'slug' => Str::slug($track['track_name']),
                'racing_categories_id' => $track['racing_categories_id'],
                'track_name' => $track['track_name'],
                'track_layouts' => $track['track_layouts']
            ]);
            $counters[$categoryId]++;
        }
    }
}
