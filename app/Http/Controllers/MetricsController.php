<?php

namespace App\Http\Controllers; // Directory

use Illuminate\Http\Request; // Illuminate PHP package.
use App\Models\UserMetric; // UserMetric model from project.

/**
 * Class MetricsController handles storeage and calcuation of user metrics.
 * Extends from controller template.
 * 
 * @package App\Http\Controllers
 */
class MetricsController extends Controller
{
    /**
     *  Store the newly create user metrics, takes parameter $request, a provided method for accesing various HTTPS requests from the illuminate pack.
     * Used here to with the validate illumate pack method, to check data pased from form is of correct data type, int, string etc...
     * Returns HTTP illuminate redirect route method with the class dashboard view passed. Uses with method to provide user message to metrics stored.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        // Validates the incoming request data. 
        $validatedData = $request->validate([
            // Shows age required and must be integer, same logic for all fields using arrow operator.
            'age' => 'required|integer',
            // Ensures weight is provied and is numeric for example.
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|string',
            'activity_level' => 'required|string',
        ]);

        // Creates a saves the metric data to a new UserMetric model object.
        $metric = new UserMetric([
            // Using request from illimunate to get the user ID of authenticated user.
            'user_id' => $request->user()->id,
            // Sets age the same value as the validated data.
            'age' => $validatedData['age'],
            'weight' => $validatedData['weight'],
            'height' => $validatedData['height'],
            'gender' => $validatedData['gender'],
            'activity_level' => $validatedData['activity_level'],
        ]);

        //  Pass BMI data to $metric model using the calculateBMI method, and passing it the current metrics model object.
        $metric->bmi = $this->calculateBMI($metric);
        //  Pass BMR data to $metric model using the calculateBMR method, and passing it the current metrics model object.
        $metric->bmr = $this->calculateBMR($metric);
        //  Pass TDEE data to $metric model using the calculateTDEE method, and passing it bmr and activity_level data from the metrics model object
        $metric->tdee = $this->calculateTDEE($metric->bmr, $metric->activity_level);

        // Save the new metric object (To Database table using save method from Eloquent ORM package in laravel)
        $metric->save();

        // Return redirect method, with route method and dashboard blade template, and uses with method to provided successes message to user.
        return redirect()->route('dashboard')->with('success', 'Metrics updated successfully!');
    }

    /**
     * Calculates the Body Mass Index (BMI) for a given UserMetric object.
     * Take the user metric model object created to utilise the metrics within the object for this calculation, and where to return the new float entry too.
     * Creates a new variable called hight in meters, which uses the height from the model and divides by 100, as stored in cm.
     * Returns the value of user metric weight data, and the height x height as per BMI formula.
     *
     * @param  UserMetric $userMetric
     * @return float
     */

    public function calculateBMI(UserMetric $userMetric) {
        // https://www.cdc.gov/healthyweight/assessing/bmi/childrens_BMI/childrens_BMI_formula.html#:~:text=Formula%20and%20Calculation&text=The%20formula%20for%20BMI%20is,to%20convert%20this%20to%20meters.&text=When%20using%20English%20measurements%2C%20pounds%20should%20be%20divided%20by%20inches%20squared.
        // Convert height in CM to height in meters for purpose of calculation.
        $heightInMeters = $userMetric->height / 100;
        // Return the value of the BMI formula with supplied metrics.
        return $userMetric -> weight / ($heightInMeters *  $heightInMeters);


    }
    /**
     * Calculates the Body Metabolic Rate (BMR) for a given UserMetric object.
     * Take the user metric model object created to utilise the metrics within the object for this calculation, and where to return the new float entry too.
     * Holds conditoinal logic as required for biological geneder differences.
     * The forumala steps are carried out using the different metric data, and final result has + 5 for men, for -161 for women, as per source.
     * The final result will be the users new BMR data, which is returned after the calling. 
     *
     * @param  UserMetric $userMetric
     * @return float
     */
    
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
    

    /**
     * Calculates the Total Dailiy Energy Expenditure (TDEE) for a given UserMetric object.
     * Take the user metric model object created to utilise the metrics within the object for this calculation, and where to return the new float entry too.
     * Needs the BMR and activity level from the user metrics model object, and returns the TDEE as a float by mulipltying the BMR by the mapped activity factor as per formula.
     * 
     * @param  float $bmr
     * @param  string $activityLevel
     * @return float
     */
    private function calculateTDEE($bmr, $activityLevel) {
        // https://www.myprotein.com/thezone/nutrition/how-to-calculate-bmr-tdee/
        // Activty factors for different levels of activity
        $activityFactors = [
            'Sedentary' => 1.2,
            'Lightly active' => 1.375,
            'Moderately active' => 1.55,
            'Very active' => 1.725,
            'Super active' => 1.9];

        // Calculate TDEE by multiplying the BMR with activity factor the user supplies, returns 1.2 if not entered.
        return $bmr * ($activityFactors[$activityLevel] ?? 1.2);
    }
}
