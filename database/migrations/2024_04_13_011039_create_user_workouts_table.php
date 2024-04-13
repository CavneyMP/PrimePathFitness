<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Track each users workout sessions
     */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_workouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // FK from users 
            $table->foreignId('workout_id')->constrained(); // FK from workouts
            $table->string('status'); // Is active?
            $table->date('date'); // Date
            $table->timestamps(); // Standard stamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workouts');
    }
};
