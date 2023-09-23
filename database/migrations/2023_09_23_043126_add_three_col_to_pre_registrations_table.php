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
        Schema::table('pre_registrations', function (Blueprint $table) {
            $table->longText('item_for_sale')->nullable();
            $table->longText('item_for_showoff')->nullable();
            $table->longText('activity')->nullable();
            $table->longText('activity_pic')->nullable();
            $table->boolean('become_sponsors')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pre_registrations', function (Blueprint $table) {
            $table->dropColumn('item_for_sale');
            $table->dropColumn('item_for_showoff');
            $table->dropColumn('activity');
            $table->dropColumn('activity_pic');
            $table->dropColumn('become_sponsors');
        });
    }
};
