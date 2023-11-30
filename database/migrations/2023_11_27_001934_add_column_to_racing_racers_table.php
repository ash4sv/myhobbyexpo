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
        Schema::table('racing_racers', function (Blueprint $table) {
            $table->integer('max_slot')->nullable()->after('slot_20'); // Slot can be use 20 or 15
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racing_racers', function (Blueprint $table) {
            $table->dropColumn('max_slot');
        });
    }
};
