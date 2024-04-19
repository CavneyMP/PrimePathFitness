<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout :: all(); // Will look to fetch all workouts from the DB
        // return workout blade view
        return view('pages.workout');
    }
}