<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Models\UserMetric;
use App\Models\Recipe;
use App\Models\UserMealPlan; 
use App\Models\MealPlanRecipe;

use Illuminate\Support\Facades\Log;

class MealPlanCreateController extends Controller
{
    public function index()
    {
        return view('pages.mealplan-
        create');
    }

    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'recipes' => 'required|array',
        ]);

        $userMetric = UserMetric :: where('user_id', $request -> user() -> id) -> latest() -> firstOrFail();

        $recipes = Recipe :: whereIn('id', $validatedData['recipes'])->get();

        $totalCalories = $recipes -> reduce(function ($carry, $recipe) {
            return $carry +  $this -> calcRecipeCalories($recipe);
        }, 0);
 


        $goalCalories = $this->calcGoalCalories ($userMetric);
        $adjustmentFactor = $goalCalories  / max($totalCalories, 1);

        // Deactivate the last active meal plan
        $lastMealPlan = UserMealPlan::where('user_id', $request -> user()->id)
            ->where('active', true) 
             ->latest('start_date')
              ->first();
        if ($lastMealPlan) {
            $lastMealPlan->active = false;
            $lastMealPlan->save();
        }
 
        $mealPlan = UserMealPlan :: create([
            'user_id' => $request -> user()->id,
             'start_date' => now(),
              'active' => true
        ]);

        foreach ($recipes as $recipe) {
            $this -> adjustAndSaveRecipe($recipe, $adjustmentFactor, $mealPlan->id);
        }

        return redirect() -> route('mealplan') -> with('success', 'Meal plan created successfully');
    }
 
    protected function calcRecipeCalories(Recipe $recipe) 
    {
        return $recipe -> originalIngredients -> sum(function ($ingredient) {
            return $ingredient -> pivot -> quantity * $ingredient->calories_per_gram;
        });
    }

    protected function calcGoalCalories(UserMetric $userMetric)
    {
        $goalAdjustments = [
            'intensive_loss' => -500,
             'moderate_loss' => -250,
              'maintain' => 0,
               'moderate_gain' => 250, 
                'extreme_gain' => 500
        ];

        $adjustment = $goalAdjustments[$userMetric -> goal_weight] ?? 0;
        return $userMetric -> tdee + $adjustment;
    }

    protected function adjustAndSaveRecipe(Recipe $recipe, $adjustmentFactor, $mealPlanId)
    {
        foreach ($recipe->originalIngredients as $ingredient) {
            $adjustedQuantity = $ingredient -> pivot -> quantity * $adjustmentFactor;

            $adjustedQuantity = round($adjustedQuantity);

            try {

                MealPlanRecipe::create([ 
                    'meal_plan_id' => $mealPlanId,
                     'recipe_id' => $recipe->id,  
                      'ingredient_id' => $ingredient->id,
                       'adjusted_quantity' => $adjustedQuantity
                        ]);

            } catch (\Exception $e) {

                Log :: error("Failed to save adjusted recipe ingredient", [
                    'error' => $e->getMessage(), 
                     'recipe_id' => $recipe->id,
                      'ingredient_id' => $ingredient->id
                        ]);
            }
        }
    }
}
 