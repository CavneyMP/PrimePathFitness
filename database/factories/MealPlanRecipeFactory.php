<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory that creates fake instances of MealPlanRecipe data model.
 * Providing a way to generate test data
 * 
 */
class MealPlanRecipeFactory extends Factory
{
    protected $model = MealPlanRecipe::class;

    /**
     * Define the model's state with relationships
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meal_plan_id' => fn() => UserMealPlan :: factory() -> create()->id,
            'recipe_id' => fn() => Recipe :: factory() -> create() -> id,
            'ingredient_id' => fn() => Ingredient :: factory()->create() -> id,
            'adjusted_quantity' => $this -> faker -> randomFloat(2, 0.5, 10)
        ];
    }
}
