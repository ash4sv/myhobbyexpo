<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apps\Section;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;
use function Symfony\Component\Translation\t;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*$this->call(PermissionsSeeder::class );*/
        /*$this->call(UsersSeeder::class);*/

        /*$this->call(HallSeeder::class);*/
        /*$this->call(SectionSeeder::class);*/
//        $this->call(BoothNumberSeeder::class);
//        $this->call(BoothSeeder::class);
//        $this->call(BoothBoothNumberSeeder::class);
        /*$this->call(SalesAgentSeeder::class);*/
//        $this->call(DbTruncateSeeder::class);
//        $this->call(BoothSpecialPriceSeeder::class);

        $this->call(MHXCupCategorySeeder::class);
    }
}
