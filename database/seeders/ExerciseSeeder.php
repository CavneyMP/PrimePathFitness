<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Equipment;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        // Ensure that EquipmentSeeder is run first
        $this->call(EquipmentSeeder::class);

        // Retrieve equipment ids
        $equipmentIds = Equipment::pluck('id', 'name')->toArray();

        // Sample exercises data - for demonstration, assuming certain structure
        $exerciseTypes = [
            'Compound Exercises' => ['Squat', 'Deadlift', 'Bench Press'],
            'Calisthenics' => ['Push-Up', 'Pull-Up', 'Dips'],
            'Cable-Only Exercises' => ['Cable Fly', 'Tricep Pushdown', 'Cable Crunches'],
            'Dumbbell-Only Exercises' => ['Dumbbell Curl', 'Dumbbell Press', 'Dumbbell Row'],
            'Bodyweight Exercises' => ['Plank', 'Burpees', 'Air Squats']
        ];

        $muscleGroups = ['Chest', 'Back', 'Legs', 'Arms', 'Shoulders', 'Core'];
        $difficultyLevels = ['Beginner', 'Intermediate', 'Advanced'];

        // Create a mix of exercises for each equipment type
        foreach ($equipmentIds as $equipmentName => $equipmentId) {
            foreach ($exerciseTypes as $type => $examples) {
                foreach ($examples as $example) {
                    for ($i = 0; $i < 4; $i++) { // Generate multiple variants
                        Exercise::create([
                            'name' => "{$example} {$i}",
                            'description' => "A {$type} targeting multiple muscles.",
                            'muscle_group' => $muscleGroups[array_rand($muscleGroups)],
                            'exercise_type' => $type,
                            'difficulty_level' => $difficultyLevels[array_rand($difficultyLevels)],
                            'equipment_id' => $equipmentId
                        ]);
                    }
                }
            }
        }
    }
}
