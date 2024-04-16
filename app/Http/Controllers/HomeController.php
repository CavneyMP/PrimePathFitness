<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMetric;
use Illuminate\Support\Facades\Log; // Import the Log facade

class HomeController extends Controller
{

    /** 
     *  Show main page, dashboard requires metrics.
     */
    public function index()
    {
        // Fetching the latest metrics for the user from the database table
        $metrics = UserMetric :: where ('user_id', auth()->id())->latest()->first();

        // DEBUGGER
        Log::debug('found', ['metrics' => $metrics]);

        // DEBUGGER
        if (!$metrics) {
            Log::warning('Non found: ' . auth()->id());
        }

        // Passing the metrics to the dashboard view
        return view ('dashboard' ,['metrics' => $metrics]);
    }
}
