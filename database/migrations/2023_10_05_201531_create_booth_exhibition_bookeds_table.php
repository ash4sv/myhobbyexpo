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
        Schema::create('booth_exhibition_bookeds', function (Blueprint $table) {
            $table->id();
            $table->char('inv_number')->nullable();
            $table->date('inv_date')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('sales_agent_id')->nullable();
            $table->foreign('sales_agent_id')->references('id')->on('sales_agents');
            $table->longText('inv_description')->nullable();
            $table->longText('add_on')->nullable();
            $table->double('total');
            $table->double('fee')->nullable();
            $table->boolean('payment_status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booth_exhibition_bookeds');
    }
};
