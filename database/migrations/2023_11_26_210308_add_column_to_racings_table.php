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
        Schema::table('racings', function (Blueprint $table) {
            $table->boolean('status')->nullable()->after('racer_3');
            $table->time('racing_duration')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racings', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('racing_duration');
        });
    }
};
