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
        Schema::create('racing_racers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('racer_registers_id')->nullable();
            $table->foreign('racer_registers_id')->references('id')->on('racer_registers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('racing_categories_id')->nullable();
            $table->foreign('racing_categories_id')->references('id')->on('racing_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('racer_name');

            $table->boolean('slot_1')->nullable();
            $table->boolean('slot_2')->nullable();
            $table->boolean('slot_3')->nullable();
            $table->boolean('slot_4')->nullable();
            $table->boolean('slot_5')->nullable();
            $table->boolean('slot_6')->nullable();
            $table->boolean('slot_7')->nullable();
            $table->boolean('slot_8')->nullable();
            $table->boolean('slot_9')->nullable();
            $table->boolean('slot_10')->nullable();
            $table->boolean('slot_11')->nullable();
            $table->boolean('slot_12')->nullable();
            $table->boolean('slot_13')->nullable();
            $table->boolean('slot_14')->nullable();
            $table->boolean('slot_15')->nullable();
            $table->boolean('slot_16')->nullable();
            $table->boolean('slot_17')->nullable();
            $table->boolean('slot_18')->nullable();
            $table->boolean('slot_19')->nullable();
            $table->boolean('slot_20')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racing_racers');
    }
};
