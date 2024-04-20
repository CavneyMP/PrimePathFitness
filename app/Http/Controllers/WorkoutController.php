<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\UserWorkout;

class WorkoutController extends Controller
{
    public function index()
    {
        $activeWorkout = UserWorkout::where('user_id', auth()->id()) // Will look to fetch all workouts from the DB
                            ->where('status', 'active')
                             ->latest()
                              ->first();

        // Pass the included related exercises when fetching
        if ($activeWorkout) {
            $workout = Workout :: with('exercises') -> find($activeWorkout->workout_id);}

        // return workout blade view
        return view('pages.workout', ['workout' => $workout]);
    }
}