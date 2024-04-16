<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.mealplan');
    }
}
