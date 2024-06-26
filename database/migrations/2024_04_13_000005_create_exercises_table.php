<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    /**
     * List of individual exercises.
     */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::dropIfExists('exercises');

        Schema::create('exercises', function (Blueprint $table) {
            $table->id(); // Unique identifier for each exercise
            $table->string('name'); // Name of the exercise
            $table->text('description'); // Description of the exercise
            $table->string('muscle_group'); // Muscle group targeted
            $table->foreignId('equipment_id')->nullable(); // Allow NULL values
            $table->string('exercise_type')->nullable(); // Such as strength, cardio, flexibility
            $table->string('difficulty_level')->nullable(); // Difficulty level of the exercise
            $table->timestamps(); // created_at and updated_at
            // look to index relevant fileds. TODO.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
