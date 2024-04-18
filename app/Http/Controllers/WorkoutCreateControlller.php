<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutCreateControlller extends Controller
{
     public function create() {
    // return workout generation builder view..
    
    return view('pages.workout-create');
}

}
