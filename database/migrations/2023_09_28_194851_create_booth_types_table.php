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
        Schema::create('booth_types', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('layout_plan')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->integer('ffe_table')->nullable();
            $table->integer('ffe_chair')->nullable();
            $table->integer('ffe_sso')->nullable();
            $table->double('price');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booth_types');
    }
};
