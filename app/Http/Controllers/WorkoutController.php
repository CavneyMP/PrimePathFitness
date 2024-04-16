<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.workout');
    }
}