<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealPlanRecipe>
 */
class MealPlanRecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meal_plan_id' => \App\Models\UserMealPlan :: factory(),
            'recipe_id' => \App\Models\Recipe :: factory(),
            'ingredient_id' => \App\Models\Ingredient :: factory(),
            'adjusted_quantity' => $this -> faker -> randomFloat(2, 0.5, 10) // The adjusted quanity the users recevie after plan creation. 
        ];
     }
}
