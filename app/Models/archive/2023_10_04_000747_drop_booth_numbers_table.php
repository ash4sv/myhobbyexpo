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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booth_numbers');
        Schema::dropIfExists('booth_types');
        Schema::dropIfExists('booths');
        Schema::dropIfExists('booths_maps');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('type_of_interests');
    }
};
