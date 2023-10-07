<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbTruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('vendors')->truncate();
        DB::table('billplz_webhook')->truncate();
        DB::table('billplz_status')->truncate();
        DB::table('booth_exhibition_bookeds')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
