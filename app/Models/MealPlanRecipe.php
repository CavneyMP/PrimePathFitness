<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represent a recipe in a meal plan along with adjustments made for the ingredient quantities.
 * Shows associations between: meal plans, recipes, ingredients with new specific quantities.
 */

class MealPlanRecipe extends Model
{
    use HasFactory;

    protected $fillable = ['meal_plan_id', 'recipe_id', 'ingredient_id', 'adjusted_quantity'];

    /**
     * Get the meal plan that the entry belongs to.
     */
    public function mealPlan()
    {
        return $this->belongsTo(UserMealPlan::class, 'meal_plan_id');
    }

    
    /**
     * Get the recipe associated with the meal plan .
     */

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Get the ingredient associated with the meal plan.
     */
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}

