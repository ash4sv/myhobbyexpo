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
        Schema::create('racing_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('racings_id')->nullable();
            $table->unsignedBigInteger('racing_racers_1')->nullable();
            $table->unsignedBigInteger('racing_racers_2')->nullable();

            $table->foreign('racings_id')->references('id')->on('racings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racing_racers_1')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('racing_racers_2')->references('id')->on('racing_racers')->cascadeOnUpdate()->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racing_results');
    }
};
