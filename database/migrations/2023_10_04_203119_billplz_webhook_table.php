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
        Schema::create('billplz_webhook', function (Blueprint $table) {
            $table->id();
            $table->string('shopref')->nullable();
            $table->string('billplz_id')->nullable();
            $table->string('collection_id')->nullable();
            $table->string('paid')->nullable();
            $table->string('state')->nullable();
            $table->char('amount')->nullable();
            $table->char('paid_amount')->nullable();
            $table->date('due_at')->nullable();
            $table->string('email')->nullable();
            $table->char('mobile')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('paid_at')->nullable();
            $table->string('x_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billplz_webhook');
    }
};
