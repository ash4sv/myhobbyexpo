<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('racing_score_boards', function (Blueprint $table) {
            $table->unsignedBigInteger('racings_id')->nullable()->after('racing_tracks_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racing_score_boards', function (Blueprint $table) {
            $table->dropColumn('racings_id');
        });
    }
};
