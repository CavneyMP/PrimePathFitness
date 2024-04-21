<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_nutritional_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // FK to users
            $table->float('carbs_ratio') -> default(0.50); // Default 50% of daily calories from carbohydrates
            $table->float('proteins_ratio') -> default(0.30); // Default 30% of daily calories from proteins
            $table->float('fats_ratio') -> default(0.20); // Default 20% of daily calories from fats
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema :: dropIfExists ('user_nutritional_settings');
    }
};
