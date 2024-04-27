<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise; 
use App\Models\UserWorkout; 
use App\Models\Equipment;
use Illuminate\Support\Facades\Log;

/**
 * WorkoutCreateController  is responsible for handling the creation of new workouts based on user inputs and preferences.
 */

class WorkoutCreateController extends Controller
{

     /**
     * Show the workout creation view.
     *
     * @return \Illuminate\View\View Returns the workout creation view.
     */
    public function index()
    {
        // return workout blade view
        return view('pages.workout-input-form');
    }

    /**
     * Store a new workout in the database based on the provided request data
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse Redirects to the workout page with a success message after creating the workout.
     */
    public function store(Request $request) {

        $request -> validate([ // Validate request data before doing anything 
            'equipment' => 'array|required|min:1', // Ensure equipment provided an array.
            'preference' => 'array|required|min:1 ', // Ensure exercise preferences provided an dan array.
            'cardio' => 'array', // Optional cardio equipment choices
            'workout_split' => 'required|string', // Required workout split type, string from form.
        ]);

        // Map equipment names to their corresponding IDs
        $equipmentIds = Equipment::whereIn('name', $request->equipment)->pluck('id');

        // Query the database for exercises that match the selected equipment and preferences and store to variable.
        $exercises = Exercise :: whereIn('equipment_id', $equipmentIds) // Filter exercises by equipment ID
        -> whereIn('exercise_type',  $request->preference) // Then filter by the type of exercise.
        ->take(18) // Limit the query to only select the first 7 exercises.
         -> get(); // Retrieve filtered exercises from DB
        
        // Create a new workout instance to populate with data from the form request.
        $workout = new Workout([
            'name' => $request -> name ?? 'Custom Workout Plan', // take name from form, if not default name provided.
            'description' => $request -> description ?? 'Based on your selected preferences', // the default description.
            'type' => $request -> workout_split, // Split chosen by the user on form.
            ]);

        
        $workout->save(); // Save new workout to the database table

        // Split exercises into 3 groups
        $days = $exercises->split(3); // Laravel's Collection method to split into 3 parts
    
        foreach ($days as $index => $dayExercises) {
            foreach ($dayExercises as $exercise) {
                $workout->exercises() -> attach($exercise -> id, ['day' => $index + 1]);
            }
        }

        UserWorkout::create([
            'user_id' => $request -> user()-> id, // ID o authenticated user.
            'workout_id' => $workout->id, // The ID of new workout plan.
            'date' => now(), //  Current date and time for the timestamps field.
        ]);

        // Redirect to the General workout Page.
        return redirect()->route('workout') -> with('success', 'Workout created successfully');;
    }
}