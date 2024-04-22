<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMealPlan;
use App\Models\MealPlanRecipe;
use App\Models\Ingredient;
use App\Models\Recipe;

/**
 * MealPlanController handles the display of active meal plans for the logged-in user.
 */
class MealPlanController extends Controller
{
    public function index()
    {
        $activeMealPlans = UserMealPlan::where('user_id', auth()->id())
                                       ->where('active', true)
                                       ->latest()
                                       ->first();
        $mealPlans = [];

        if ($activeMealPlans) {
            $mealPlans = $activeMealPlans->recipes->map(function ($mealPlanRecipe) {
                $recipeDetails = Recipe::with(['ingredients'])
                                       ->find($mealPlanRecipe->recipe_id);
                return [
                    'mealPlanName' => $activeMealPlans->name,
                    'recipeName' => $recipeDetails->name,
                    'ingredients' => $recipeDetails->ingredients->map(function ($ingredient) use ($mealPlanRecipe) {
                        $adjustedIngredient = $mealPlanRecipe->adjustedIngredients->where('ingredient_id', $ingredient->id)->first();
                        return [
                            'name' => $ingredient->name,
                            'adjustedQuantity' => $adjustedIngredient ? $adjustedIngredient->adjusted_quantity : $ingredient->pivot->quantity
                        ];
                    })
                ];
            });
        }

        // Return the meal plan blade view with the meal plans data
        return view('pages.mealplan', ['mealPlans' => $mealPlans]);
    }
}
