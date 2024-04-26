<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\UserWorkout;

/**
 *  WorkoutController holds logic for retrieval and display of the active workout for the logged-in user.
 */

class WorkoutController extends Controller
{
    public function index()
    {
        $activeWorkout = UserWorkout::where('user_id', auth()->id()) // Will look to fetch all workouts from the DB
                            ->where('status', 'active') // The methods from Eloquent ORM, here we ar filtering for status and active.
                             ->latest() // Again an ORM method, arranges results in desceding order. 
                              ->first(); // Method retirevies the newest record in the query.
                              $workout = null; // Initialize $workout to null by default

        $workoutPlanDays = collect(); // a collection to hold the grouped exercises

        // Pass the included related exercises when fetching
        if ($activeWorkout) { 
         $workout = Workout :: with('exercises') -> find($activeWorkout->workout_id);} // Laravels eager loading syntax, allows to load relationships of exercises with what workout.
        
         $workoutDays = $workout->exercises
         -> sortBy('pivot.day')
         -> groupBy('pivot.day');

        // return workout blade view
        return view('pages.workout-overview', [
            'workout' => $workout, 
            'workoutDays' => $workoutDays
        ]);

    }
}