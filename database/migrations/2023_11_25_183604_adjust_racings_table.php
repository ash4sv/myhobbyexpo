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
            $table->dropColumn('line_1');
            $table->dropColumn('line_2');
            $table->dropColumn('line_3');

            $table->unsignedBigInteger('racing_categories_id')->nullable();
            $table->unsignedBigInteger('racing_tracks_id')->nullable();
            $table->date('racing_date')->nullable();
            $table->time('racing_time')->nullable();
            $table->unsignedBigInteger('racer_1')->nullable();
            $table->unsignedBigInteger('racer_2')->nullable();
            $table->unsignedBigInteger('racer_3')->nullable();

            $table->foreign('racing_categories_id')->references('id')->on('racing_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racing_tracks_id')->references('id')->on('racing_tracks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racer_1')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racer_2')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racer_3')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racings', function (Blueprint $table) {
            $table->string('line_1')->nullable();
            $table->string('line_2')->nullable();
            $table->string('line_3')->nullable();

            $table->dropColumn('racing_categories_id');
            $table->dropColumn('racing_tracks_id');
            $table->dropColumn('racing_date');
            $table->dropColumn('racing_time');
            $table->dropColumn('racer_1');
            $table->dropColumn('racer_2');
            $table->dropColumn('racer_3');
        });
    }
};
