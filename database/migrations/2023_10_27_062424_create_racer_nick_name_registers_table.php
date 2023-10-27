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
        Schema::create('racer_nick_name_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('racer_id');
            $table->foreign('racer_id')->references('id')->on('racer_registers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('uniq');
            $table->string('nickname');
            $table->unsignedBigInteger('register');
            $table->unique('register');
            $table->string('shirt_zie')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racer_nick_name_registers');
    }
};
