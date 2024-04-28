<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\UserWorkout;

/**
 *  WorkoutShowController holds logic for retrieval and display of the active workout for the logged-in user.
 */
class WorkoutShowController extends Controller
{

    /**
     * Retrieve and display active workout and the detailed exercises.
     * Method fetches the user's active workout then organises the exercises by the days on which they bound.
     *
     * @return \Illuminate\View\View Returns the workout overview page with populated active workout details... or a message for no active workout is found.
     */
    public function index()
    {
        $activeWorkout = UserWorkout::where('user_id', auth()->id()) // Will look to fetch all workouts from the DB
                            ->where('status', 'active') // The methods from Eloquent ORM, here we ar filtering for status and active.
                             ->latest() // Again an ORM method, arranges results in desceding order. 
                              ->first(); // Method retirevies the newest record in the query.
                              $workout = null; // Initialize $workout to null by default
                              $workoutDays = null; // Initialize $workoutDays to null by default


        $workoutPlanDays = collect(); // a collection to hold the grouped exercises

        // Pass the included related exercises when fetching
        if ($activeWorkout) { 
         $workout = Workout :: with('exercises') -> find($activeWorkout->workout_id);} // Laravels eager loading syntax, allows to load relationships of exercises with what workout.
        
        if ($workout !== null) {
        // Sort exercises by day and group them by day
         $workoutDays = $workout->exercises
         -> sortBy('pivot.day')
         -> groupBy('pivot.day');
        }

        // return workout blade view
        return view('pages.workout-overview', [
            'workout' => $workout, 
            'workoutDays' => $workoutDays
        ]);

    }
}