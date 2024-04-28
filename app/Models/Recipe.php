<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

/**
 * Represents a recipe used in a meal plan.
 * Holds information: recipe's ingredients, base quantities.
 */
class Recipe extends Model
{ 
    use HasFactory;

    // Mass assigable attributes needed for meal planner.
    protected $fillable = [ 'name', 'description', 'mealtype' ];  // $fillable property = ables mass assignment attributes from model

    /**
    * Defines many-to-many relationship of Ingredients to adjusted quantities for meal_plan_Recipes.
    */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient :: class, 'meal_plan_recipes')
            -> withPivot('adjusted_quantity');
    } 

    /**
     * Defines the many-to-many relationship of Ingredients with their original quantities.
     */
    public function originalIngredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')
                    ->withPivot('quantity'); 
    }
} 