<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Equipment;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure that EquipmentSeeder is run first
        $this->call(EquipmentSeeder::class);

        // Sample exercises data
        $exercisesData = [
            [
                'name' => 'Bench Press',
                'description' => 'A compound exercise that targets the chest, shoulders, and triceps.',
                'muscle_group' => 'Chest',
                'equipment_id' => Equipment::where('name', 'Bench')->first()->id,
                'exercise_type' => 'Compound',
                'difficulty_level' => 'Intermediate'
            ],
            [
                'name' => 'Pull-Ups',
                'description' => 'Exercise performed by lifting yourself up on a pull-up bar, targeting the upper body.',
                'muscle_group' => 'Upper Body',
                'equipment_id' => Equipment::where('name', 'Pull-Up Bar')->first()->id,
                'exercise_type' => 'Bodyweight',
                'difficulty_level' => 'Advanced'
            ],
            // Add more exercises as needed...
        ];

        // Loop through each exercise and add it to the database
        foreach ($exercisesData as $exercise) {
            Exercise::create($exercise); 
        }
    }
}
