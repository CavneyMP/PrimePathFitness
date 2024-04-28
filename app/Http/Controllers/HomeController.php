<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMetric;
use Illuminate\Support\Facades\Log;

/**
 * Handles the logic for displaying user dashboard, may include user metrics if form filled /metrics.
 * Provides a central view for users.
 */
class HomeController extends Controller
{
    /**
     * Display the dashboard view with the latest metrics of the authenticated user.
     * 
     * View returned with dashboard class and binds metric data taken from the user, if any. 
     *  If no metrics are found, logs a warning message indicating that no metrics were found for the authenticated use (Laravel logs, not user)
     *
     * @return \Illuminate\View\View Returns dashboard view, attempts to populate metric.
     */

    public function index()
    {
        // Fetching the latest metrics for the user for the auth'd user and log the metrics stored too.
        $metrics = UserMetric :: where ('user_id', auth()->id())->latest()->first();
        Log::debug('found', ['metrics' => $metrics]);

        // A wanring log, if no metrics are found, and what for what user.
        if (!$metrics) {
            Log::warning('Non found: ' . auth()->id());
        }

        // Returning view with dashboard template and bound metric data.
        return view ('dashboard' ,['metrics' => $metrics]);
    }
}
