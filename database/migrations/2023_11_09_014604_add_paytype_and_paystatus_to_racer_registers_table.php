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
        Schema::table('racer_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_type')->nullable()->after('approval');
            $table->boolean('payment_status')->nullable()->after('payment_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racer_registers', function (Blueprint $table) {
            $table->dropColumn('payment_type');
            $table->dropColumn('payment_status');
        });
    }
};
