<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise; 
use App\Models\UserWorkout; 
use App\Models\Equipment;
use App\Models\Ingredient; 
use App\Models\Recipe;
use App\Models\UserMetric; 
use App\Models\MealPlanRecipe; 
use App\Models\UserMealPlan;
use Illuminate\Support\Facades\Log;

// MealPlanCreateController class for handling the meal plan creation.
class MealPlanCreateController extends Controller
{
    /**
     * To show MealPlanCreatePage by returning view with the mealplan-create class
     *
     * @return \Illuminate\View\View
     */    public function index()
    {
        // return MealPlan Create blade view
        return view('pages.mealplan-create');
    }





    // Main store method:

    /**
     *  Store the newly created meal plan, takes parameter $request, a provided method for accesing various HTTPS requests from the illuminate pack.
     * Used here to with the validate illumate pack method, to check data pased from form is of correct data type, int, string etc...
     * Returns HTTP illuminate redirect class to route meal plan, using route method. Uses with method to provide user message to advise workout created.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $validated = $request -> validate([
            'recipes' => 'required|array',
        ]);

        // Logic to Fetch the most recent user metrics from the database.
        // Queries the UserMetric Table, and finds User ID matches
        // Filtering condtions: Latest, gets the order of created at, so its the first entry of user metrics
        // FirstOrFail will throw the exception if user metrics not found.
        $userMetric = UserMetric :: where('user_id', $request -> user() -> id) -> latest() -> firstOrFail();

         // Retrieves the recipes selected by the user based on their recipe IDs from the user form
         $recipes = Recipe :: whereIn('id', $validated['recipes']) -> get(); 
        // Varaible to hold total calories of all recipes.
        // Laravel reduce method to iterate over each recipe.
        // For each recipe we call calculateRecipeCalories, passing the recipe itself.
        $totalCalories = $recipes -> reduce(function ($carry, $recipe) {
            $calories = $this -> calculateRecipeCalories($recipe);
            return  $carry + $calories;
        }, 0);

        // Variable to hold the goal calories.
        $goalCalories = $this->calculateGoalCalories($userMetric);

        // varable to hold the adjustment factor, that will be used to adjust the recipes.
        $adjustmentFactor = $goalCalories / max($totalCalories, 1);  // Divsion by 0 event handler

        $mealPlan = UserMealPlan :: create([
                'user_id' => $request -> user()->id,
                 'start_date' => now(),
                   'active' => true
                ]);

        // Adjustments and to save each of the recipes based on the calculated adjustment factor figure.
        foreach ($recipes as $recipe) {
            $this -> adjustAndSaveRecipe($recipe,  $adjustmentFactor, $mealPlan->id); 
        }
        // Redirect to the General workout Page, with success message
        return redirect()->route('meal')->with('success', 'Workout created successfully');
    }






    // Other methods used in store function:


    /**
     * Calculates the total caloric content of a recipe based on its ingredients.
     *
     * @param Recipe $recipe
     * @return float Will be the total calories from the recipe by finding the relevant ingrdeients.
     */
    protected function calculateRecipeCalories(Recipe $recipe)
    {
        return $recipe -> ingredients -> sum(function ($ingredient) {
            return $ingredient -> pivot -> quantity * $ingredient->calories_per_gram;
        });
    }

    /**
    * Calculates the daily caloric goal based on the user's metrics and goal adjustment factor. 
    *
    * @param UserMetric $userMetric
    * @param string $goalType
    * @return float Will be the total Kcal target for the user derrived from their TDEE and their fitness goal adjustment factor. 
    */
    protected function calculateGoalCalories(UserMetric $userMetric)
    {

        // Mapping new varaible to advised fitness goal.
        $goalWeightAdjustments = [
        'intensive_loss' => -500,
        'moderate_loss' => -250,
        'maintain' => 0,
        'moderate_gain' => 250,
        'extreme_gain' => 500
        ];

        // Fetches the caloric adjusmtnet based on the user goal provided
        $adjustment = $goalWeightAdjustments[$userMetric -> goal_weight] ?? 0;

    // Return the TDDE + Adjustment value
    return $userMetric->tdee + $adjustment;    }

        /**
     * Adjusts and saves individual recipes to the meal plan with the adjusted quantities.
     *
     * @param Recipe $recipe
     * @param float $adjustmentFactor
     * @param int $mealPlanId
     */
    protected function adjustAndSaveRecipe(Recipe $recipe, $adjustmentFactor, $mealPlanId) 
    {
        foreach ($recipe->ingredients as $ingredient) {
            $adjustedQuantity = $ingredient->pivot->quantity * $adjustmentFactor;
            MealPlanRecipe::create([
                'meal_plan_id' => $mealPlanId,
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient->id,  // Include ingredient ID
                'adjusted_quantity' => $adjustedQuantity
            ]);
        }
    }
}