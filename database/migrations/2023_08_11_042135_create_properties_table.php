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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name_owner', 60);
            $table->string('email_owner', 100);
            $table->string('residential_set', 45);
            $table->string('tower', 45);
            $table->string('appartment', 45);
            $table->string('address', 300);
            $table->unsignedBigInteger('sector_id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
