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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('email')->nullable();
            $table->string('phone_number')->unique();
            $table->string('phone_code');
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->date('birthday')->nullable(); 
            $table->enum('sex', ['male', 'female', 'any'])->nullable(); 

            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
