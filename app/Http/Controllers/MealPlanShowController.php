<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade

class MealPlanShowController extends Controller
{
    public function index()
    {
        return view('pages.meal-plan-generator');
    }

    public function showUserMealPlan()
    {
        $userId = Auth::id();

        Log :: info('User ID:', ['id' => $userId]); // Log user ID

        try {
            $mealPlan = UserMealPlan::with(['groupedRecipes.ingredients'])
                -> where('user_id', $userId)
                -> where('active', true)
                -> firstOrFail();
            
            Log :: info('Meal Plan Details:', $mealPlan -> toArray()); // Log meal plan details
    
            // Group ingredients by recipe id
            $recipes = [];
            foreach ($mealPlan->groupedRecipes as $recipe) {
                if (!isset($recipes[$recipe->id])) {
                    $recipes[$recipe->id] = $recipe;
                    $recipes[$recipe->id]->ingredients = collect();
                }
    
                foreach ($recipe->ingredients as $ingredient) {
                    if ($recipes[$recipe->id]->ingredients->pluck('id')->doesntContain($ingredient->id)) {
                        $recipes[$recipe->id]->ingredients->push($ingredient);
                    }
                }
            }
            
            // Log prepared recipe details
            Log::info('Prepared Recipes:', $recipes);
    
            // Return the view with the recipe details
            return view('pages.mealplan', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
        } catch (\Exception $e) {
            
            Log::error('Error fetching meal plan:', ['error' => $e->getMessage()]);

            return view('pages.mealplan', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
        }
    }
    
}
