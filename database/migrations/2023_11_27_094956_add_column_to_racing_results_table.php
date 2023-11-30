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
            $table->unsignedBigInteger('racing_racers_3')->nullable()->after('racing_racers_2');
            $table->foreign('racing_racers_3')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();

            $table->boolean('racing_racers_1_status')->nullable()->after('racing_racers_1');
            $table->boolean('racing_racers_2_status')->nullable()->after('racing_racers_2');
            $table->boolean('racing_racers_3_status')->nullable()->after('racing_racers_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racing_results', function (Blueprint $table) {
            $table->dropColumn('racing_racers_3');
            $table->dropColumn('racing_racers_1_status');
            $table->dropColumn('racing_racers_2_status');
            $table->dropColumn('racing_racers_3_status');
        });
    }
};
