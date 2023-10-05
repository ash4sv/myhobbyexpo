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
        Schema::create('billplz_status', function (Blueprint $table) {
            $table->id();
            $table->string('shopref')->nullable();
            $table->string('billplz_id')->nullable();
            $table->string('billplz_paid')->nullable();
            $table->string('billplz_paid_at')->nullable();
            $table->string('billplz_x_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billplz_status');
    }
};
