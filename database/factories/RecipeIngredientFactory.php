<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeIngredient>
 */
class RecipeIngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' =>     \App\Models\Recipe::factory(), // Asscoiation of a recipe.
            'ingredient_id' => \App\Models\Ingredient::factory(), // Link an ingredient. 
            'quantity' => $this -> faker -> numberBetween(1, 100) // A random amount of each ingredient.
        ];
    }
}
