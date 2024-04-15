<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMetric;


class HomeController extends Controller
{

    /** 
     *  Show main page, dashboard requires metrics.
     */
    public function index()
    {
        // Fetching the latest metrics for the user from the database table
        $metrics = UserMetric :: where ('user_id', auth()->id())->latest()->first();

        // Passing the metrics to the dashboard view
        return view ('dashboard' ,['metrics' => $metrics]);

    }
}
