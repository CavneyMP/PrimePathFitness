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
        Schema::create('user_metrics', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->integer('age');
            $table->float('weight');
            $table->float('height');
            $table->string('activity_level');
            $table->string('gender');
            $table -> string('goal_weight') -> nullable(); // Target weight a user specifies.
            $table->float('bmi')->nullable(); // Added column for BMI
            $table->float('bmr')->nullable(); // Added column for BMR
            $table->float('tdee')->nullable(); // Added column for TDEE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_metrics');
    }
};
