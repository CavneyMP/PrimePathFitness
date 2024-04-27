<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserMealPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserMealPlanFactory extends Factory
{
    protected $model = UserMealPlan :: class;

    public function definition()
    {
        return [
            'user_id'       => \App\Models\User :: factory(),
            'start_date'    => $this -> faker->  dateTimeBetween('-1 month', 'now'), // Changing dates for reality.
            'end_date'      => $this -> faker->  dateTimeBetween('now', '+1 month'), // Chaning dates for reality
            'active'        => $this -> faker ->  boolean(80), // % Radomize that it wil lbe active or not for reality. 
        ];
    }
}
