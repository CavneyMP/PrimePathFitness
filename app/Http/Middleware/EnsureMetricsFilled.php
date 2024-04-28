<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserMetric;

class EnsureMetricsFilled
{
    public function handle( Request $request, Closure $next)
    {
        $user = $request -> user(); 

        $metrics = UserMetric :: where('user_id', $user -> id) -> first();

        if ( !$metrics) {

            return redirect('metrics') -> with('error', 'Please fill out your metrics information first.');
        }   

        return $next( $request);
    }
    
}
