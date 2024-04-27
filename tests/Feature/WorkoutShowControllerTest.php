<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use App\Models\UserWorkout;
use App\Models\Workout;



class WorkoutShowControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test display of an active workout.
     */
    public function testDisplayActiveWorkout()
    {

    }
}