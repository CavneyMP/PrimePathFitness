<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MealPlanRecipe;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\UserMealPlan;


/**
 * MealPlanController handles the display of active meal plans for the logged-in user.
 */
class MealPlanController extends Controller
{
// public function showUserMealPlan()
// {
//     $userId = Auth::id();
//      $mealPlan = UserMealPlan::with(['groupedRecipes.ingredients'])
//                              ->where('user_id', $userId)
//                                ->where('active', true)
//                                ->firstOrFail();

//     // Group ingredients by recipe id
//     $recipes = [];
//     foreach ($mealPlan -> groupedRecipes as $recipe) {
//         if (!isset($recipes[$recipe -> id])) {
//             $recipes[$recipe -> id] = $recipe; 
//              $recipes[$recipe -> id] -> ingredients = collect();
//         } 
 
//         foreach ($recipe->ingredients as $ingredient) {
//     if ($recipes[$recipe -> id] -> ingredients -> pluck('id') -> doesntContain($ingredient -> id)) {
//             $recipes[$recipe -> id] -> ingredients -> push($ingredient); 
//         }  
//     }
//     }

//          return view('pages.mealplan-overview', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
}
