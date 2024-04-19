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

        // New workout model with the data from the request to save.
        Workout :: create($request->all());

        // Redirect to the General workout Page.
        return redirect()->route('workout.index');

    }

}
