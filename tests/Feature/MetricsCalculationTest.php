<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\MetricsController;
use App\Models\UserMetric;


/**
 * Tests that ensure the functionality of calculating user metric
 * Ensures metrics can be stored correctly and validates input on the forms
 */

class MetricsCalculationTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new MetricsController();
        $this->userMetric = new UserMetric([
            'age' => 25,
            'weight' => 70, 
            'height' => 180, 
            'gender' => 'Male',
            'activity_level' => 'Moderately active',
        ]);
    }

    /**
     * Tests the BMI calculation
     */
    public function testBMICalculation()
    {
        $bmi = $this->controller->calculateBMI($this->userMetric);
         // Expected calculation as per
        $expectedBMI = 70 / (1.8 * 1.8); 
        $this->assertEquals($expectedBMI, $bmi);
    }
    /**
     * Tests the BMR calculation for a male
     */
    public function testBMRMaleCalculation()
    {
        $this->userMetric->gender = 'Male';
        $bmr = $this->controller->calculateBMR($this->userMetric);
        $expectedBMR = (10 * 70) + (6.25 * 180) - (5 * 25) + 5;
        $this->assertEquals($expectedBMR, $bmr);
    }

    /**
     * Tests the BMR calculation for a female
     */
    public function testBMRFemaleCalculation()
    {
        $this->userMetric->gender = 'Female';
        $bmr = $this->controller->calculateBMR($this->userMetric);
        // Same calulation as per 
        $expectedBMR = (10 * 70) + (6.25 * 180) - (5 * 25) - 161;
        $this->assertEquals($expectedBMR, $bmr);
    }

     /**
     * Tests TDEE calculation for users
     */
    public function testTDEECalculation()
    {
        $bmr = (10 * 70) + (6.25 * 180) - (5 * 25) + 5;
        $tdee = $this->controller->calculateTDEE($bmr, 'Moderately active');
        $expectedTDEE = $bmr * 1.55;
        $this->assertEquals($expectedTDEE, $tdee);
    }
}
