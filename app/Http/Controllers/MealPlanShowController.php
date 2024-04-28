<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * This class looks to handle the display of meal plans for users
 * & provides methods for the retrieval and display of the active meal plan, with recipe ingredients amounts.
 */

class MealPlanShowController extends Controller
{

    /**
     * Index displays the meal plan overview view..
     *
     * @return \Illuminate\View\View  Returns the meal  plan page.
     */
    public function index()
    {
        return view('pages.mealplan-overview'); // Change this, not sure why it was generator view? confused how did that work...
    }

    /**
     * Fetch and display active meal plan for the user.
     * Retrieves the meal plan marked as active, logs the operation (used in dev), handles any errors encountered during the fetch.
     *
     * @return \Illuminate\View\View Returns a view with the active meal plan and its details, if faliure = error information.
     */
    public function showUserMealPlan()
    {
        // Get user ID
        $userId = Auth::id();

        // Log User ID (Dev)
        Log :: info('User ID:', ['id' => $userId]); 

        try {
            // Get active meal plan for the user
            $mealPlan = UserMealPlan::with(['groupedRecipes.ingredients'])
                -> where('user_id', $userId)
                -> where('active', true)
                -> firstOrFail();
            
            // Log details of meal plan
            Log :: info('Meal Plan Details:', $mealPlan -> toArray()); // Log meal plan details
    
            // Group ingredients by recipe id
            $recipes = [];
            foreach ($mealPlan->groupedRecipes as $recipe) {
                if (!isset($recipes[$recipe->id])) {
                    // Checking if the ingredient is not already added to the recipem, avoiding duplicates as table entries will be more than recipes amount.
                    // Issue was it was showing the same amount of HTML cards as there was ingredeints, so had to handle this way.                    
                    $recipes[$recipe->id] = $recipe;
                    $recipes[$recipe->id]->ingredients = collect();
                }
    
                foreach ($recipe->ingredients as $ingredient) {
                    if ($recipes[$recipe->id] -> ingredients -> pluck('id')->doesntContain($ingredient->id)) {
                        $recipes[$recipe->id] -> ingredients -> push($ingredient); 
                    }
                }
            }
            
            // Log prepared recipe details
            Log::info('Prepared Recipes:', $recipes);
    
            // Return the view with the recipe details
            return view('pages.mealplan-overview', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
        } catch (\Exception $e) {

            // Log if error is encounterd (Dev)
            Log::error('Error fetching meal plan:', ['error' => $e -> getMessage()]);
            
            // Set meal plan and recipes to null
            $mealPlan = null;
            $recipes = null;

            // return the view along with the error information
            return view('pages.mealplan-overview', ['mealPlan' => $mealPlan, 'recipes' => $recipes]);
        }
    }
    
}