<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealPlanRecipe>
 */
class MealPlanRecipeFactory extends Factory
{
    protected $model = MealPlanRecipe::class;

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
