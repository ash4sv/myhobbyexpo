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
        Schema::create('racer_registers', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->double('price_category');
            $table->double('total_cost');
            $table->string('full_name');
            $table->string('identification_card_number');
            $table->string('phone_number');
            $table->string('email');
            $table->string('nickname');
            $table->string('team_group')->nullable();
            $table->string('registration');
            $table->string('receipt')->nullable();
            $table->boolean('approval');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racer_registers');
    }
};
