<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MealPlanController displays the meal plan page.
class MealPlanController extends Controller
{
    /**
     * Returns view with meal plan page class.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return workout blade view
        return view('pages.mealplan');
    }
}