<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Auth;
use App\Models\MealPlanRecipe;
use App\Models\Ingredient;
use App\Models\Recipe;

/**
 * MealPlanController handles the display of active meal plans for the logged-in user.
 */
class MealPlanController extends Controller
{
public function showUserMealPlan()
{
    $userId = Auth::id();
     $mealPlan = UserMealPlan::with(['groupedRecipes.ingredients'])
                             ->where('user_id', $userId)
                               ->where('active', true)
                               ->firstOrFail();

    // Group ingredients by recipe id
    $recipes = [];
    foreach ($mealPlan -> groupedRecipes as $recipe) {
        if (!isset($recipes[$recipe -> id])) {
            $recipes[$recipe -> id] = $recipe;
            $recipes[$recipe -> id] -> ingredients = collect();
        } 
 
        foreach ($recipe->ingredients as $ingredient) {
            $recipes[$recipe->id]->ingredients->push($ingredient); 
        }
    }

         return view('pages.mealplan', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
}
}