<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise; 
use App\Models\UserWorkout; 
use App\Models\Equipment;
use Illuminate\Support\Facades\Log;

// MealPlanCreateController class for handling the meal plan creation.
class MealPlanCreateController extends Controller
{
    /**
     * To show MealPlanCreatePage by returning view with the mealplan-create class
     *
     * @return \Illuminate\View\View
     */    public function index()
    {
        // return MealPlan Create blade view
        return view('pages.mealplan-create');
    }

    /**
     *  Store the newly created meal plan, takes parameter $request, a provided method for accesing various HTTPS requests from the illuminate pack.
     * Used here to with the validate illumate pack method, to check data pased from form is of correct data type, int, string etc...
     * Returns HTTP illuminate redirect class to route meal plan, using route method. Uses with method to provide user message to advise workout created.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        // Validate the data collected from the form.
        $request -> validate([
        ]);

        // Redirect to the General workout Page, with success message
        return redirect()->route('mealplan') -> with('success', 'Workout created successfully');;
    }
}