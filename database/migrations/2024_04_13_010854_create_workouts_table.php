<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    /**
     * Pgit redefined workouts
     */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Name of the workout
            $table->text('description'); //Descirption of workout
            $table->string('type'); //Workout type, cardio, strength...
            $table->timestamps(); //Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout');
    }
};
