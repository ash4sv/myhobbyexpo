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
        Schema::table('racing_results', function (Blueprint $table) {
            $table->unsignedBigInteger('racing_categories_id')->nullable()->after('id');
            $table->unsignedBigInteger('racing_tracks_id')->nullable()->after('racing_categories_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racing_results', function (Blueprint $table) {
            $table->dropColumn('racing_categories_id');
            $table->dropColumn('racing_tracks_id');
        });
    }
};
