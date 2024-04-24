<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class MealPlanCreateControllerTest extends TestCase
{
    use RefreshDatabase; // Refresh data base between tests to avoid interference.
    use WithoutMiddleware; // To disable any middleware important for controllers,
}
