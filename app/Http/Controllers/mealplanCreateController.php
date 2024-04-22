<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Exercise; 
use App\Models\UserWorkout; 
use App\Models\Equipment;
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

    /**
     *  Store the newly created meal plan, takes parameter $request, a provided method for accesing various HTTPS requests from the illuminate pack.
     * Used here to with the validate illumate pack method, to check data pased from form is of correct data type, int, string etc...
     * Returns HTTP illuminate redirect class to route meal plan, using route method. Uses with method to provide user message to advise workout created.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        // Validate the data collected from the form.
        $request -> validate([
            'recipes' => 'required|array',
            'days' => 'required|integer|min:1',
            'goal_weight' => 'required|in:intensive_loss,moderate_loss,maintain,moderate_gain,extreme_gain'
            
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
            return $carry + $this -> calculateRecipeCalories($recipe);
        }, 0);

        // Variable to hold the goal calories.
        $goalCalories = $this->calculateGoalCalories($userMetric, $validated ['goal_weight'] );

        // varable to hold the adjustment factor, that will be used to adjust the recipes.
        $adjustmentFactor = $goalCalories / $totalCalories;

        // Creates a new meal plan in the userMealPlan table.
        $mealPlan = UserMealPlan :: create([
                'user_id' => $request -> user()->id,
                 'start_date' => now(),
                  'end_date' => now() -> addDays($validated['days']), 
                   'active' => true
                ]);

        // Adjustments and to save each of the recipes based on the calculated adjustment factor figure.
        foreach ($recipes as $recipe) {
            $this -> adjustAndSaveRecipe($recipe,  $adjustmentFactor, $mealPlan->id); 
        }

 
        // Redirect to the General workout Page, with success message
        return redirect()->route('mealplan')->with('success', 'Workout created successfully');
    }
        // Function to calculate goal calories
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
}