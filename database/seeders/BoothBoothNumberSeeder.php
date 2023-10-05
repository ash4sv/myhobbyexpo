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

        $spacePet1 = Booth::where('booth_type', 'Pet Fiesta (Premium) - (6m x 6m)')->first();
        $spacePet2 = Booth::where('booth_type', 'Pet Fiesta (Normal) - (6m x 6m)')->first();
        $spacePet3 = Booth::where('booth_type', 'Pet Fiesta With Shell Scheme (Premium) - (3m x 3m)')->first();
        $spacePet4 = Booth::where('booth_type', 'Pet Fiesta With Shell Scheme (Normal) - (3m x 3m)')->first();
        $spacePet5 = Booth::where('booth_type', 'Bare Space - (3m x 3m)')->first();
        $spaceSec2Pet5 = Booth::where('booth_type', 'Bare Space - Pet & Exotic Zone (2m x 2.5m)')->first();

        $secPet1 = BoothNumber::where('id', 85)->first();
        $secPet11 = BoothNumber::where('id', 87)->first();
        $secPet2 = BoothNumber::where('id', 86)->first();
        $secPet22 = BoothNumber::where('id', 88)->first();
        $secPet3 = BoothNumber::where('id', 90)->first();
        $secPet31 = BoothNumber::where('id', 91)->first();
        $secPet32 = BoothNumber::whereBetween('id', [96, 99])->get();
        $secPet33 = BoothNumber::whereBetween('id', [104, 110])->get();

        $secPet4 = BoothNumber::whereBetween('id', [92, 95])->get();
        $secPet41 = BoothNumber::whereBetween('id', [100, 103])->get();

        $secPet5 = BoothNumber::whereBetween('id', [111, 116, ])->get();

        $spacePet1->boothNumbers()->attach($secPet1);
        $spacePet1->boothNumbers()->attach($secPet11);
        $spacePet2->boothNumbers()->attach($secPet2);
        $spacePet2->boothNumbers()->attach($secPet22);

        $spacePet4->boothNumbers()->attach($secPet3);
        $spacePet4->boothNumbers()->attach($secPet31);
        $spacePet4->boothNumbers()->attach($secPet32);
        $spacePet4->boothNumbers()->attach($secPet33);

        $spacePet3->boothNumbers()->attach($secPet4);
        $spacePet3->boothNumbers()->attach($secPet41);

        $spacePet5->boothNumbers()->attach($secPet5);

        $sec2Pet1 = BoothNumber::whereBetween('id', [117, 159])->get();

        $spaceSec2Pet5->boothNumbers()->attach($sec2Pet1);

        $spaceSec3Pet = Booth::where('booth_type', 'Shell Scheme - Aquatic Zone (2m x 2.5m)')->first();
        $spaceSec3Pet2 = Booth::where('booth_type', 'Bare Space - Aquatic Zone (2m x 2.5m)')->first();

        $secSec3Pet5 = BoothNumber::whereBetween('id', [160, 172, ])->get();
        $secSec3Pet6 = BoothNumber::whereBetween('id', [173, 178, ])->get();

        $spaceSec3Pet->boothNumbers()->attach($secSec3Pet5);
        $spaceSec3Pet2->boothNumbers()->attach($secSec3Pet6);
    }
}
