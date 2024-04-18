<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutCreateController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.workout-create');
    }

}
