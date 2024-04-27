<?php

namespace Database\Factories;

use App\Models\UserMetric;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMetric>
 */

class UserMetricFactory extends Factory
{
    protected $model = UserMetric::class;

    public function definition()
    {
        return [
            'user_id' =>
             \App\Models\User :: factory(),

            'whoop_refresh_token' =>
            $this->faker->lexify('??????????'), // Random token to simulate the token provided by oAuth. 
        ];
    }
}