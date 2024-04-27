<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>       $this -> faker -> sentence(2), // PHP faker will make up a short title for the recipe
            'description'=> $this -> faker -> text(75), // PHP faker will make up a brief description of the recipe
            'mealtype' =>   $this -> faker -> randomElement(['breakfast', 'lunch', 'dinner']) // Assign its type of meal
        ];
    }
}
