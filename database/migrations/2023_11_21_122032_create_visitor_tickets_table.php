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
        Schema::create('visitor_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('uniq');
            $table->longText('visitor')->nullable();
            $table->longText('cart')->nullable();
            $table->double('overallTotal')->nullable();
            $table->longText('billplz')->nullable();
            $table->boolean('payment_status');
            $table->boolean('redeem_status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_tickets');
    }
};
