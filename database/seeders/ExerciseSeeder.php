<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use Illuminate\Support\Facades\DB;

/**
 * Exercise seeder, used for workwork generator.
 * can be expanded easily, fields just need be unified.
 */
class ExerciseSeeder extends Seeder
{
    public function run()
    {
         // Disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

         Exercise::truncate(); // Clears the exercises table safely with foreign key checks disabled
 
         // Enable foreign key checks back
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $exercisesData = [
            // Compound Exercises (12 Total)
            ['name' => 'Squat', 'description' => 'A compound exercise targeting the lower body.', 'muscle_group' => 'Legs', 'equipment_id' => 1, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Deadlift', 'description' => 'A compound exercise that targets multiple muscle groups including the back, legs, and core.', 'muscle_group' => 'Full Body', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Bench Press', 'description' => 'A compound upper body exercise focusing on the chest, shoulders, and triceps.', 'muscle_group' => 'Upper Body', 'equipment_id' => 3, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Shoulder Press', 'description' => 'Targets the shoulders and triceps with overhead pressing movements.', 'muscle_group' => 'Shoulders', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Leg Press', 'description' => 'Focuses on the legs and glutes, performed using a leg press machine.', 'muscle_group' => 'Legs', 'equipment_id' => 5, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'T-Bar Row', 'description' => 'Targets the middle back by pulling a T-bar.', 'muscle_group' => 'Back', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Hang Clean', 'description' => 'A dynamic compound exercise that improves explosive power and muscle coordination.', 'muscle_group' => 'Full Body', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Front Squat', 'description' => 'Similar to squats but with the barbell held at the chest, emphasizing the quads.', 'muscle_group' => 'Legs', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Sumo Deadlift', 'description' => 'A variation of the standard deadlift with a wider stance targeting more of the inner thighs.', 'muscle_group' => 'Legs', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Military Press', 'description' => 'A strict form of shoulder press performed standing.', 'muscle_group' => 'Shoulders', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Push Press', 'description' => 'A variation of the overhead press incorporating a slight knee bend to generate power.', 'muscle_group' => 'Shoulders', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],
            ['name' => 'Thruster', 'description' => 'Combines a front squat with an overhead press.', 'muscle_group' => 'Full Body', 'equipment_id' => 2, 'exercise_type' => 'Compound Exercises'],

            // Calisthenics (12 Total)
            ['name' => 'Pull Up', 'description' => 'A calisthenics exercise primarily for the upper body.', 'muscle_group' => 'Upper Body', 'equipment_id' => 4, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Push Up', 'description' => 'A bodyweight exercise that targets the chest, shoulders, and triceps.', 'muscle_group' => 'Upper Body', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Dips', 'description' => 'Targets the chest and triceps through a dipping motion.', 'muscle_group' => 'Upper Body', 'equipment_id' => 4, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Muscle Up', 'description' => 'An advanced calisthenics movement combining a pull-up with a dip.', 'muscle_group' => 'Upper Body', 'equipment_id' => 4, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Handstand Push Up', 'description' => 'A challenging upside down push-up that targets the shoulders and arms.', 'muscle_group' => 'Shoulders/Arms', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'L-sit', 'description' => 'A seated hold with legs extended horizontally, challenging for core strength.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Pistol Squat', 'description' => 'A one-legged squat that challenges balance and strength.', 'muscle_group' => 'Legs', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Crunches', 'description' => 'A basic abdominal exercise that targets the core.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Back Lever', 'description' => 'A static hold that targets the back and core.', 'muscle_group' => 'Back/Core', 'equipment_id' => 4, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Front Lever', 'description' => 'An advanced calisthenics core exercise performed on a pull-up bar.', 'muscle_group' => 'Core', 'equipment_id' => 4, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Dragon Flag', 'description' => 'An advanced core exercise popularized by Bruce Lee.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],
            ['name' => 'Planche', 'description' => 'An advanced bodyweight hold where the body is held parallel to the ground.', 'muscle_group' => 'Core/Shoulders', 'equipment_id' => null, 'exercise_type' => 'Calisthenics'],

            // Cable-Only Exercises (12 Total)
            ['name' => 'Cable Row', 'description' => 'Targets the upper back and arms.', 'muscle_group' => 'Back/Arms', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Fly', 'description' => 'Targets the chest through cabled lateral movements.', 'muscle_group' => 'Chest', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Tricep Pushdown', 'description' => 'A tricep isolating exercise using a cable machine.', 'muscle_group' => 'Triceps', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Bicep Curl', 'description' => 'Isolates the biceps using a cable.', 'muscle_group' => 'Biceps', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Lateral Raise', 'description' => 'Isolates the shoulder muscles through lateral raises.', 'muscle_group' => 'Shoulders', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Face Pull', 'description' => 'Targets the rear deltoids and upper back for improved posture.', 'muscle_group' => 'Upper Back/Deltoids', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Kickback', 'description' => 'Targets the glutes through leg kickbacks using a cable.', 'muscle_group' => 'Glutes', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Crunch', 'description' => 'A core exercise where you crunch against cable resistance.', 'muscle_group' => 'Core', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Woodchop', 'description' => 'A rotational move that targets the obliques and core.', 'muscle_group' => 'Obliques/Core', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Pull Through', 'description' => 'Great for posterior chain development, involving a cable machine.', 'muscle_group' => 'Posterior Chain', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Reverse Cable Crossover', 'description' => 'Targets the upper chest and shoulders with a crossing cable motion.', 'muscle_group' => 'Chest/Shoulders', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],
            ['name' => 'Cable Upright Row', 'description' => 'Targets the traps and shoulders using a cable.', 'muscle_group' => 'Traps/Shoulders', 'equipment_id' => 5, 'exercise_type' => 'Cable-Only Exercises'],

            // Dumbbell-Only Exercises (12 Total)
            ['name' => 'Dumbbell Press', 'description' => 'An exercise focusing on the chest and shoulders.', 'muscle_group' => 'Chest/Shoulders', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Fly', 'description' => 'Isolates the chest muscles by moving dumbbells in an arc.', 'muscle_group' => 'Chest', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Row', 'description' => 'Targets the back muscles by rowing dumbbells.', 'muscle_group' => 'Back', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Lunge', 'description' => 'A lower body exercise that targets the legs and glutes.', 'muscle_group' => 'Legs/Glutes', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Curl', 'description' => 'A bicep exercise that involves curling dumbbells to work the arms.', 'muscle_group' => 'Biceps', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Hammer Curl', 'description' => 'Targets the biceps and forearms with a neutral grip.', 'muscle_group' => 'Biceps/Forearms', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Shoulder Press', 'description' => 'A pressing exercise targeting the shoulders.', 'muscle_group' => 'Shoulders', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Arnold Press', 'description' => 'A variation of the shoulder press developed by Arnold Schwarzenegger.', 'muscle_group' => 'Shoulders', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Split Squat', 'description' => 'A single-leg squat variation holding dumbbells.', 'muscle_group' => 'Legs', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Dumbbell Shrug', 'description' => 'Targets the trapezius muscles in the upper back.', 'muscle_group' => 'Upper Back', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Goblet Squat', 'description' => 'A squat variation holding a single dumbbell in front of the chest.', 'muscle_group' => 'Legs', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],
            ['name' => 'Single-arm Dumbbell Row', 'description' => 'Targets the back muscles, performed with one arm at a time.', 'muscle_group' => 'Back', 'equipment_id' => 1, 'exercise_type' => 'Dumbbell-Only Exercises'],

            // Bodyweight Exercises (12 Total)
            ['name' => 'Plank', 'description' => 'A bodyweight exercise strengthening the core.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Burpees', 'description' => 'A full body exercise that improves strength and aerobic capacity.', 'muscle_group' => 'Full Body', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Sit-ups', 'description' => 'Focuses on strengthening the abdominal muscles.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Jump Squats', 'description' => 'Incorporates a squat with a jump for explosive power training.', 'muscle_group' => 'Legs', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Mountain Climbers', 'description' => 'A cardio exercise that also targets the core and legs.', 'muscle_group' => 'Legs/Core', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Leg Raises', 'description' => 'Targets the lower abs by lifting legs toward the ceiling.', 'muscle_group' => 'Lower Abs', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Russian Twists', 'description' => 'A core exercise that involves twisting motions with or without weight.', 'muscle_group' => 'Core', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Box Jumps', 'description' => 'An explosive jump onto a box to build power and leg strength.', 'muscle_group' => 'Legs', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Walking Lunges', 'description' => 'A variation of lunges where you move forward while performing the lunges.', 'muscle_group' => 'Legs', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Wall Sit', 'description' => 'Isometric hold that targets the thighs and glutes by sitting against a wall.', 'muscle_group' => 'Legs/Glutes', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Superman', 'description' => 'An exercise for back extension, lying face down and lifting arms and legs.', 'muscle_group' => 'Lower Back', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
            ['name' => 'Hip Bridge', 'description' => 'Focuses on strengthening the glutes and lower back by lifting the hips.', 'muscle_group' => 'Glutes/Lower Back', 'equipment_id' => null, 'exercise_type' => 'Bodyweight Exercises'],
        ];

        foreach ($exercisesData as $exercise) {
            Exercise::create($exercise);
        }
    }
}
