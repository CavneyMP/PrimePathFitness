<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetricsController extends Controller
{

        /**
     * Display the metrics form page
     */
    public function showForm()
    {
        // Returns the view for the metrics form

        return view('metrics.form');
    }

        /**
     * Process the submitted metrics form.
     */

    public function processForm(Request $request)
    {
        // Validate the submitted data, an of right type.
        $validatedData = $request->validate([
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'age' => 'required|integer',
            'activity_level' => 'required|string',
        ]);     
    }
}