<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserMetric;


/**
 * Middleware that ensures the user has filled out their metrics information.
 * Middleware works by checking the authenticated user has recorded their metrics first.
 * If user = not filled out metrics, they are redirected to the metrics.
 * prompting them to fill out the information before they can proceed, cannot work out meal plan without the data, so wouldnt be very elegant.
 */

class EnsureMetricsFilled
{

    /**
     * Handles incoming request to ensure the user's metrics are recorded in the database.
     * If they are not found, user will need to go to metrics form if metrics are not found, if they have though, it allows the request to continue
     *
     * @param  \Illuminate\Http\Request  $request  The request instance, will hold route to /mealplan-create.
     * @param  \Closure  $next  The middleware handler.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response Returns a redirect response to metrics form if metrics are not filled, or allows them in.
     */
    public function handle( Request $request, Closure $next)
    {

        // Get the user object from the requestt
        $user = $request -> user(); 


        // Check the user has metrics information stored
        $metrics = UserMetric :: where('user_id', $user -> id) -> first();

        // If not found, redirect
        if ( !$metrics) {

            return redirect('metrics') -> with('error', 'Please fill out your metrics information first.');
        }   
        // if found, allow request via $next
        return $next( $request);
    }
    
}
