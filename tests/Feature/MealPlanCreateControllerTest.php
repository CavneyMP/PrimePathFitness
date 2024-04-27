<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use App\Models\Recipe;
use App\Models\UserMetric;


class MealPlanCreateControllerTest extends TestCase
{
    use RefreshDatabase; // Refresh data base between tests to avoid interference.

    /**
     * Test successful meal plan creation.
     */
    public function testSuccessfulMealPlanCreation()
    {


    }
}