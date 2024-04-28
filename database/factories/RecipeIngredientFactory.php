<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory for creating fake objects of RecipeIngredient data model.
 * Links recipes to ingredients with a random quantity to simulate the likely data in the seeder now and in the future.
 */
class RecipeIngredientFactory extends Factory
{

    protected $model = RecipeIngredient::class;


    /**
     * Define the model's default state, with a relationship to recipe & ingredient.
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
