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
        Schema::create('racing_score_boards', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('racing_categories_id')->nullable();
            $table->unsignedBigInteger('racing_tracks_id')->nullable();
            $table->unsignedBigInteger('line_1')->nullable();
            $table->unsignedBigInteger('line_2')->nullable();
            $table->unsignedBigInteger('line_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racing_score_boards');
    }
};
