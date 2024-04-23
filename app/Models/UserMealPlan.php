<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_date', 'end_date', 'active']; 

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    { 
        return $this->hasMany(MealPlanRecipe:: class, 'meal_plan_id');
    }

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
