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
        Schema::create('racing_tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('racing_categories_id')->nullable();
            $table->foreign('racing_categories_id')->references('id')->on('racing_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('track_name');
            $table->string('track_layouts');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racing_tracks');
    }
};
