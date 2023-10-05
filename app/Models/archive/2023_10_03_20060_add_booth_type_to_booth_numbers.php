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
        Schema::table('booth_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('booth_type_prices_id')->nullable()->after('vendor_id');
            $table->string('type')->nullable();
            $table->double('price')->nullable()->after('booth_type_prices_id');
            $table->double('early_bird_price')->nullable()->after('price');
            $table->dateTime('endDate')->nullable()->after('early_bird_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booth_numbers', function (Blueprint $table) {
            $table->dropColumn('booth_type_prices_id');
            $table->dropColumn('price');
            $table->dropColumn('early_bird_price');
            $table->dropColumn('endDate');
        });
    }
};
