<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Store the meal plans generated for each user
     */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_meal_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // FK to `users`
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_meal_plans');
    }
};
