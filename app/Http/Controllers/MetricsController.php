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
            'gender' => 'required|string',
            'activity_level' => 'required|string',
        ]);

        $metric = new UserMetric([
            'user_id' => $request->user()->id,
            'age' => $validatedData['age'],
            'weight' => $validatedData['weight'],
            'height' => $validatedData['height'],
            'gender' => $validatedData['gender'],
            'activity_level' => $validatedData['activity_level'],
        ]);

        $metric->save();

        return redirect()->route('dashboard')->with('success', 'Metrics updated successfully!');
    }

    public function calculateMetrics(UserMetric $userMetric) {
        // https://www.cdc.gov/healthyweight/assessing/bmi/childrens_BMI/childrens_BMI_formula.html#:~:text=Formula%20and%20Calculation&text=The%20formula%20for%20BMI%20is,to%20convert%20this%20to%20meters.&text=When%20using%20English%20measurements%2C%20pounds%20should%20be%20divided%20by%20inches%20squared.
        $heightInMeters = $userMetric->height / 100;
        $bmi = $userMetric -> weight / ($heightInMeters *  $heightInMeters);
        $bmr = $this-> calculateBMR($userMetric);
        $tdee = $this-> calculateTDEE($bmr, $userMetric -> activity_level);

    }
    
    private function calculateBMR(UserMetric $userMetric) {
        // https://www.myprotein.com/thezone/nutrition/how-to-calculate-bmr-tdee/
        // Basal metabolic rate
        // Male calculation to calculate BMR
        if ($userMetric->gender === 'Male') {
            return (10 * $userMetric->weight) // Need 10 multiplied by weight in KG, represents engergy cost of maintaining weight.
                 + (6.25 * $userMetric->height) // Then need 6.25 multiplied by height in CM,  represents metabolic cost of maintaining height.
                 - (5 * $userMetric->age) //  Then need 5 multiplied by age in years, represents adjustments in decreased metobolism with age.
                 + 5; // Gender adjustments adds 5 to account for higher muscle mass.
        } else {
            // Female calculation to calcuate BMR
            return (10 * $userMetric->weight) // Need 10 multiplied by weight in KG, represents engergy cost of maintaining weight.
                 + (6.25 * $userMetric->height) // Then need 6.25 multiplied by height in CM,  represents metabolic cost of maintaining height.
                 - (5 * $userMetric->age) //  Then need 5 multiplied by age in years, represents adjustments in decreased metobolism with age.
                 - 161; // Gender adjustment subtracts 161 for lower muscle mass.
        }
    }
    
    private function calculateTDEE($bmr, $activityLevel) {
        // https://www.myprotein.com/thezone/nutrition/how-to-calculate-bmr-tdee/
        // Activty factors for different levels of activity
        $activityFactors = [
            'Sedentary' => 1.2,
            'Lightly active' => 1.375,
            'Moderately active' => 1.55,
            'Very active' => 1.725,
            'Super active' => 1.9];

        // Calculate TDEE by multiplying the BMR with activity factor the user supplies.
        return $bmr * ($activityFactors[$activityLevel]);
    }
}
