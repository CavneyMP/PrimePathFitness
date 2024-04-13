<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Run the migrations.
     */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_exercise_logs', function (Blueprint $table) {
            $table->id(); // PK
            $table->foreignId('user_workout_id')->constrained('user_workouts'); // FK to `user_workouts`
            $table->foreignId('exercise_id')->constrained(); // FK to `exercises`
            $table->integer('sets');
            $table->integer('reps');
            $table->float('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_exercise_logs');
    }
};
