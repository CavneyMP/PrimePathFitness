<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMetric;

class MetricsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'age' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'activity_level' => 'required|string',
        ]);

        $metric = new UserMetric([
            'user_id' => $request->user()->id,
            'age' => $validatedData['age'],
            'weight' => $validatedData['weight'],
            'height' => $validatedData['height'],
            'activity_level' => $validatedData['activity_level'],
        ]);

        $metric->save();

        return redirect()->route('dashboard')->with('success', 'Metrics updated successfully!');
    }
}
