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
        Schema::create('visitor_shopee_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('uniq')->nullable();
            $table->string('slug')->nullable();
            $table->string('code');
            $table->string('ticketType')->nullable();
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_shopee_tickets');
    }
};
