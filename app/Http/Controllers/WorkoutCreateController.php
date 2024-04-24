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
        return view('pages.workout-create');
    }

    /**
     * Store a new workout in the database based on the provided request data
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse Redirects to the workout page with a success message after creating the workout.
     */
    public function store(Request $request) {

        $request -> validate([ // Validate request data before doing anything 
            'equipment' => 'array|required', // Ensure equipment provided an array.
            'preference' => 'array|required', // Ensure exercise preferences provided an dan array.
            'cardio' => 'array', // Optional cardio equipment choices
            'workout_split' => 'required|string', // Required workout split type, string from form.
        ]);

        // Map equipment names to their corresponding IDs
        $equipmentIds = Equipment::whereIn('name', $request->equipment)->pluck('id');

        // Query the database for exercises that match the selected equipment and preferences and store to variable.
        $exercises = Exercise :: whereIn('equipment_id', $equipmentIds) // Filter exercises by equipment ID
        -> whereIn('exercise_type',  $request->preference) // Then filter by the type of exercise.
         -> get(); // Retrieve filtered exercises from DB

        // Arrays to keep exercises related to each split
         $pushTypeExercises = collect();
         $pullTypeExercises = collect();
         $legTypeExercises = collect();

         //  Depending on the split filter exercises
        switch ($request->workout_split) {
            case 'PPL':
                $pushExercises = 
                $pullExercises = 
                $legExercises = 
                break;

            // TODO cases for FullBody and UpperLower
}
        
        // Create a new workout instance to populate with data from the form request.
        $workout = new Workout([
            'name' => $request -> name ?? 'Custom Workout Plan', // take name from form, if not default name provided.
            'description' => $request -> description ?? 'Based on your selected preferences', // the default description.
            'type' => $request -> workout_split, // Split chosen by the user on form.
            ]);

        
        $workout->save(); // Save new workout to the database table

        // We now need to attach selected exercises to workout, uses a many-to-many relationship.
        $workout->exercises() -> attach($exercises -> pluck('id')->toArray()); // Using pluck to get only the ID of exercises, modified to use toArray()

        UserWorkout::create([
            'user_id' => $request -> user()-> id, // ID o authenticated user.
            'workout_id' => $workout->id, // The ID of new workout plan.
            'date' => now(), //  Current date and time for the timestamps field.
        ]);

        // Redirect to the General workout Page.
        return redirect()->route('workout') -> with('success', 'Workout created successfully');;
    }
}