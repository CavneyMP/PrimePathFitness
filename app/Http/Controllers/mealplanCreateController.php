<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise; 
use App\Models\UserWorkout; 
use App\Models\Equipment;
use Illuminate\Support\Facades\Log;

class MealPlanCreateController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.mealplan-create');
    }

    public function store(Request $request) {

        $request -> validate([ // Validate request data before doing anything 
        ]);

        // Redirect to the General workout Page.
        return redirect()->route('mealplan') -> with('success', 'Workout created successfully');;
    }
}
