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
            'name' => 'required|string', // Make sure input is string.
            'description' => 'required|string', // as above
            'type' => 'required|string', // as above
        ]);

        // New workout model with the data from the request to save.
        Workout :: create($request->all());

        // Redirect to the General workout Page.
        return redirect()->route('workout.index');

    }

}
