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
        Schema::create('sample_services', function (Blueprint $table) {
            $table->id();
            $table->string('sample_service_title');
            $table->unsignedSmallInteger('sample_service_price');
            $table->integer('sample_service_time');
            $table->boolean('IsActive');
            $table->boolean('IsDentistOnly');
            $table->boolean('IsClientVisible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_services');
    }
};
