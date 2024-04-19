<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutCreateController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.workout-create');
    }

    public function store(Request $request) {

        $request -> validate([ // Validate request data before doing anything 
            'equipment' => 'array|required', // Ensure equipment provided an array.
            'preference' => 'array|required', // Ensure exercise preferences provided an dan array.
            'cardio' => 'array', // Optional cardio equipment choices
            'workout_split' => 'required|string', // Required workout split type, string from form.
        ]);

        // Query the database for exercises that match the selected equipment and preferences and stoire to variable.
        $exercises = Exercise :: whereIn('equipment_id', $request->equipment) // Filter exercises by equipment ID
        -> whereIn('exercise_type',  $request->preference) // Then filter by the type of exercise.
         -> get(); // Retrieve filtered exercises from DB
        
        // Create a new workout instance to populate with data from the form request.
        $workout = new Workout([
            'name' => $request -> name ?? 'Custom Workout Plan', // take name from form, if not default name provided.
            'description' => $request -> description ?? 'Based on your selected preferences', // the default description.
            'type' => $request -> workout_split, // Split chosen by the user on form.
            ]);

        // New workout model with the data from the request to save.
        Workout :: create($request->all());

        // Redirect to the General workout Page.
        return redirect()->route('workout.index');

    }

}
