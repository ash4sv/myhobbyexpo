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
        Schema::create('carts_temp', function (Blueprint $table) {
            $table->id();
            $table->string('uniq')->nullable();
            $table->longText('cart')->nullable();
            $table->double('overallTotal')->nullable();
            $table->timestamps();
        });

        Schema::create('visitors_temp', function (Blueprint $table){
            $table->id();
            $table->string('uniq')->nullable();
            $table->longText('visitor')->nullable();
            $table->longText('billplz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts_temp');
        Schema::dropIfExists('visitors_temp');
    }
};
