<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Models\UserMetric;
use App\Models\Recipe;
use App\Models\UserMealPlan; 
use App\Models\MealPlanRecipe;

use Illuminate\Support\Facades\Log;
/**
 * Manages the creation of meal plans, offers users data from our data set. 
 * Holds methods to for validation of user input, calcualtion of the nutrition targets required
 * And stores meal plans in the database
 */
class MealPlanCreateController extends Controller
{

    /**
     * Index function returns view that shows the selection form.
     *
     * @return \Illuminate\View\View Returns mealplan-input-form view for meal plan selection.
     */
    public function index()
    {
        return view('pages.mealplan-input-form');
    }


    /**
     * Store method is able to create the meal plan, it takes the users selection via the form, 
     * Validates user input, deactivates previous meal plans, adjusts recipe quantities based on caloric needs, and persists the new meal plan.
     *
     * @param  \Illuminate\Http\Request  $request  Will contain the data back from the meal plan form.
     * @return \Illuminate\Http\RedirectResponse   Responsible for the redirection of the user to meal plan overview page.
     */

    public function store(Request $request)
    {
        // Validate user input and that 'recipes' is an array & has 3 items.
        $validatedData = $request -> validate([
            'recipes' => 'required|array|min:3|max:3',
        ]);

        // Must retrieve the latest user metric in order to calculate dietary goals
        $userMetric = UserMetric :: where('user_id', $request -> user() -> id) -> latest() -> firstOrFail();

        // Fetch the recipes from the database.
        $recipes = Recipe :: whereIn('id', $validatedData['recipes'])->get();

        // Calculate the total calories of the recipes that were selected .
        $totalCalories = $recipes -> reduce(function ($carry, $recipe) {
            return $carry +  $this -> calcRecipeCalories($recipe);
        }, 0);
 

         // Here we need to work out the goal calories and then an adjustment factor for recipe quantities for later use.
        $goalCalories = $this->calcGoalCalories ($userMetric);
        $adjustmentFactor = $goalCalories  / max($totalCalories, 1);

        // Deactivate the last active meal plan, avoid showing all plans on over view, only recent, so we enable easy change of the meal plan.
        $lastMealPlan = UserMealPlan::where('user_id', $request -> user()->id)
            ->where('active', true) 
             ->latest('start_date')
              ->first();
        if ($lastMealPlan) {
            $lastMealPlan->active = false;
            $lastMealPlan->save();
        }
        
        // Creation of the meal plan and adjusting recipes according to caloric needs of the user. 
        $mealPlan = UserMealPlan :: create([
            'user_id' => $request -> user()->id,
             'start_date' => now(),
              'active' => true
        ]);
        // This is where the quantities of each ingredient are adjusted and then save the adjusted recipes to the database held under "meal_plan_recipes" table.
        foreach ($recipes as $recipe) {
            $this -> adjustAndSaveRecipe($recipe, $adjustmentFactor, $mealPlan->id);
        }
        
        // Redirection of the user to the meal plan overview page (main page, plan is shown)
        return redirect() -> route('mealplan') -> with('success', 'Meal plan created successfully');
    }

    /**
     * calcRecipeCalories calcualtes the total calories of each recipe, as we need this to know how much to adjust by when compared to the users target.
     *
     * @param  Recipe $recipe  This is the recipe of which to calculate calories.
     * @return int             This returns the total calories of the recipe based on ingredients.
     */
    protected function calcRecipeCalories(Recipe $recipe) 
    {
        return $recipe -> originalIngredients -> sum(function ($ingredient) {
            return $ingredient -> pivot -> quantity * $ingredient->calories_per_gram;
        });
    }

    /**
     * Calculates the goal calories based on the user's target weight goal, maps to the input of details held in user metrics
     *
     * @param  UserMetric $userMetric  User metrics that will include target weight goals and total daily energy expenditure for this calculation.
     * @return int                     Returns a final goal kcal, derrived from precalulated TDEE and adding the goal weight mapped amnount. 
     */
    protected function calcGoalCalories(UserMetric $userMetric)
    {
        //https://www.healthline.com/nutrition/calorie-deficit#faq
        //https://www.healthline.com/nutrition/clean-bulk#:~:text=Data%20suggests%20that%20a%20conservative,the%20conservative%20side%20(%203%20).

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


    /**
     * This method adjusts the quantities of ingredients of any recipe, works from the on the caloric adjustment factor and then stores the adjusted recipes ands it ingredeints.
     *
     * @param  Recipe $recipe          The recipe that needs to be adjust.
     * @param  float  $adjustmentFactor The factor of how much to adjust any ingredient quantity.
     * @param  int    $mealPlanId      The ID of the meal plan the recipe belongs too.
     */

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
 