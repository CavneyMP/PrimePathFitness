<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\UserMealPlan;
use App\Models\MealPlanRecipe;

/**
 * Tests that ensure functionality of meal plan creation.
 * Ensures: meal plans are correctly stored, in the database, with associated recipes and ingredients.
 */
class MealPlanCreateControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a meal plan is stored, checks database side is succesful for meal plan storing.
     */
    public function testStoreMealPlan()
    {
        // Starting by creating the user
        $user = User :: factory()->create();
        $this->actingAs($user);

    
        // Going on to create a user meal plan with the above user's ID and setting the plan to active.
        $mealPlan = UserMealPlan :: factory() -> create([
            'user_id' => $user->id,
            'active' => true
        ]);
    
        // Pre planned to take three recipes with the factory
        // And associate 4 ingredients, which is about what they all actually have
        $recipes = Recipe :: factory(3) -> create() -> each(function ($recipe) use ($mealPlan) {
            $recipe -> ingredients() -> attach(
                Ingredient :: factory() -> count(4) -> create(),
                ['adjusted_quantity' => rand(1, 100), 'meal_plan_id' => $mealPlan->id]
            );
        });
    
        // Post to the store route, that will handle the logic we are testing for.
        $response = $this -> actingAs($user) -> post(route('mealplan-create.store'), [
            'recipes' => $recipes -> pluck('id') -> toArray()
        ]);
    
        // Checking that the UserMealPlan entry was actually created
        $this->assertDatabaseHas('user_meal_plans', [
            'id' => $mealPlan->id,
            'user_id' => $user->id,
            'active' => true
        ]);
    
        // Checking that the MealPlanRecipes are actually associated with the UserMealPlan
        foreach ($recipes as $recipe) {
            foreach ($recipe -> ingredients as $ingredient) {
                $this -> assertDatabaseHas('meal_plan_recipes', [

                    // Tables that would need to be there for this action to have been succesful
                    'meal_plan_id' => $mealPlan->id,
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $ingredient->id,

                ]);
            }
        }
    }
}

