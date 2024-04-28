<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;


/**
 * Factory for creating fake instances of Recipe data model.
 * Used to generate test recipes: random names, descriptions, and meal types
 * Providing a way to generate test data
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

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
