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
        Schema::create('booth_booth_number', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booth_id');
            $table->unsignedBigInteger('booth_number_id');
            $table->timestamps();

            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('booth_number_id')->references('id')->on('booth_numbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booth_booth_number');
    }
};
