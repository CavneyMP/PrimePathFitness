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
                              
        // return workout blade view
        return view('pages.workout');
    }
}