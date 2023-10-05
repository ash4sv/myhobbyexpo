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


        $space1 = Booth::findOrFail(5);
        $space2 = Booth::findOrFail(6);
        $space3 = Booth::findOrFail(8);
        $space4 = Booth::findOrFail(7);

        $sec1 = BoothNumber::whereBetween('id', [42, 54])->get();
        $sec2 = BoothNumber::whereBetween('id', [53, 58])->get();
        $sec3 = BoothNumber::whereBetween('id', [59, 68])->get();
        $sec4 = BoothNumber::whereBetween('id', [69, 84])->get();

        $space1->boothNumbers()->attach($sec1);
        $space2->boothNumbers()->attach($sec2);
        $space3->boothNumbers()->attach($sec3);
        $space4->boothNumbers()->attach($sec4);

        /*$spacePet1 = Booth::findOrFail();

        $secPet1 = BoothNumber::whereBetween('id', [42, 54])->get();*/
    }
}
