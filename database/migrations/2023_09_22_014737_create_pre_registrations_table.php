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
        Schema::create('pre_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name_company');
            $table->string('person_in_charge');
            $table->string('contact_no');
            $table->string('email');
            $table->string('group_team_members')->nullable();
            $table->integer('selection_in');
            $table->string('bare_size')->nullable();
            $table->decimal('shell_scheme')->nullable();
            $table->decimal('basic_lot')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registrations');
    }
};
