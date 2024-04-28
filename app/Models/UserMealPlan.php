<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a meal plan a user has.
 * Stores: meal plan's active status (Used in current dev), and its duration (Not used in current dev)
 */
class UserMealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_date', 'end_date', 'active']; 


    /**
     * User relationship defining the who has the meal plan.
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Recipes relationship returning the meal plan recipes associated with this meal plan.
     */

    public function recipes()
    { 
        return $this->hasMany(MealPlanRecipe:: class, 'meal_plan_id');
    }


    /**
     * A bit more of a complex relationship... looks to get all recipes through the MealPlanRecipe join table
     * and include the associated ingredients for each recipe.
     */
    public function groupedRecipes()
    {
        return $this->hasManyThrough(
            Recipe:: class,
            MealPlanRecipe:: class,
            'meal_plan_id', // FK on the MealPlanRecipe
            'id', // FK on the Recipe table 
            'id', // FK on the UserMealPlan
            'recipe_id' // FK on the MealPlanRecipe 
        ) ->with ('ingredients');
    }
}
