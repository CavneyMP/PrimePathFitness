<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutCreateController extends Controller
{
    public function index()
    {
        $workouts = Workout :: all(); // Will look to fetch all workouts from the DB
        // return workout blade view
        return view('pages.workout-create');
    }

    public function store(Request $request) {

    }
    

}
