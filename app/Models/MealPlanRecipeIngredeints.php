<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlanRecipeIngredeints extends Model
{
    use HasFactory;

    protected $fillable = ['meal_plan_recipe_id',  'ingredient_id',  'adjusted_quantity'];

    public function mealPlanRecipe()
    {
        return $this -> belongsTo(MealPlanRecipe :: class);
    }
 
    public function ingredient()
    {   
        return $this -> belongsTo(Ingredient :: class);
    }
}
