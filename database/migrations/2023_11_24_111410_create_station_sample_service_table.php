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
        Schema::create('station_sample_service', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('sample_service_id');

            // Foreign key constraints
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('sample_service_id')->references('id')->on('sample_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_sample_service');
    }
};
