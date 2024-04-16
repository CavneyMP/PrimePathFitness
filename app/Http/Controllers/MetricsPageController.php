<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetricsPageController extends Controller
{
    public function index()
    {
        // return workout blade view
        return view('pages.metric');
    }
}