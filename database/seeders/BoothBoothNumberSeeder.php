<?php

namespace Database\Seeders;

use App\Models\Apps\Booth;
use App\Models\Apps\BoothNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoothBoothNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('booth_booth_number')->truncate();


        // Get the Booth and BoothNumber models
        $boothLightYello = Booth::find(1);
        $boothNumbersLightYelloAssign = BoothNumber::whereBetween('id', [12, 16])->get();

        $boothLightGreen = Booth::find(2);
        $boothNumbersLightGreenAssign = BoothNumber::whereBetween('id', [1, 11])->get();

        $booth = Booth::find(3); // Assuming booth_id 1 exists in your database
        $boothNumbers = BoothNumber::whereBetween('id', [28, 41])->get();

        $boothPink = Booth::find(4);
        $boothNumbersPinkAssign = BoothNumber::whereBetween('id', [17, 27])->get();

        // Attach the boothNumbers to the booth
        $booth->boothNumbers()->attach($boothNumbers);
        $boothPink->boothNumbers()->attach($boothNumbersPinkAssign);
        $boothLightGreen->boothNumbers()->attach($boothNumbersLightGreenAssign);
        $boothLightYello->boothNumbers()->attach($boothNumbersLightYelloAssign);

        // [1, 11]
        // [1, 7]
    }
}
