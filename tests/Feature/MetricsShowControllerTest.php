<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;


 /**
  * Tests for metric related actions.
 */
class MetricsShowControllerTest extends TestCase
    {
        use RefreshDatabase;
        
            /**
            * Tests for the successful metrics storing
            */
        public function testSuccessfulMetricsStorage()
        {
            // Create a user and ensure they are verified, was having issue without this
            $user = User :: factory( )-> create([
                'email_verified_at' => now(),
            ]);
    
            // Login simulation
            $this -> actingAs($user);
    
            // A POST request with necessary data
            $response = $this    -> post(route('metrics.store'), [
                'age'            => 25,
                'weight'         => 70,
                'height'         => 180,
                'gender'         => 'Male',
                'activity_level' => 'Moderately active',
                'goal_weight'    => 'maintain'
            ]);
    
            // Check the correct response
            $response   ->  assertRedirect(route('dashboard'));
            $response   ->  assertSessionHas('success', 'Metrics updated successfully!');
            $this       ->  assertDatabaseHas('user_metrics', [
    
                'user_id'        => $user->id,
                'age'            => 25,
                'weight'         => 70,
                'height'         => 180,
                'gender'         => 'Male',
                'activity_level' => 'Moderately active',
                'goal_weight'    => 'maintain' 
    
            ]);
        }
    
        /**
         * Test for ensuring validation failures for metrics storage if data missing.
         */ 
        public function testValidationErrors()
        {
            $user = User :: factory()->create(); 
            $this -> actingAs($user);
    
            $response = $this -> post(route('metrics.store'),
            [
                'age' => 25, // Pass age only. 
            ]);
    
            $response -> assertRedirect(); 
            $response -> assertSessionHasErrors([
                
                'weight', 
                'height', 
                'gender', 
                'activity_level', 
                'goal_weight'
            ]);
        }


    }