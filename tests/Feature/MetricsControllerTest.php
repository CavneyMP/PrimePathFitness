<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;



class MetricsControllerTest extends TestCase
{
    use RefreshDatabase;

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
}