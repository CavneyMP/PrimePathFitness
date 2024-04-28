<?php

namespace Database\Factories;

use App\Models\UserMetric;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 

/**
 * A factory class that we will be using for testing functionaility.
 * Provides random data for various metrics.
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMetric>
 */

class UserMetricFactory extends Factory
{
    protected $model = UserMetric :: class;

    /**
     * Define the data model's state using fake values.
     *
     * @return array<string, mixed> Attributes of the UserMetric model
     */
    public function definition()
    {
        return [
            // Data collected from the metrics form.
            'user_id'            => User :: factory(),
            'age'                => $this -> faker -> numberBetween(18, 65), // age, ranging 18 and 65 years old
            'weight'             => $this -> faker -> numberBetween(50, 120), // weight, ranging between 50kg and 120kg 
            'height'             => $this -> faker -> numberBetween(150, 200), // height, raning 150 to 200cm
            'gender'             => $this -> faker -> randomElement(['Male', 'Female']), // Either gender
            'activity_level'     => $this -> faker -> randomElement(['Sedentary', 'Lightly active', 'Moderately active', 'Very active', 'Super active']), // activity level. 
           'goal_weight'        => $this -> faker -> randomElement(['intensive_loss', 'moderate_loss', 'maintain', 'moderate_gain', 'extreme_gain']), // goal weight figure.
            // Data calculated from the Metrics controller. 
            'bmi'                => $this -> faker -> numberBetween(2, 40), // Underweight, health weight, over weight representation for the BMI 
            'bmr'                => $this -> faker -> numberBetween(120, 2400),  // Represents an example basil metabolic rate between 1200 and 2400 kcal.
            'tdee'               => $this -> faker -> numberBetween(1800, 3000), // Repreesnts total daily expenditure to kcal. 
        
        
        ] ;

    }
    
}