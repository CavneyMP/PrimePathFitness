<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlanRecipe extends Model
{
    use HasFactory;

    protected $fillable = ['meal_plan_id' , 'recipe_id' , 'adjusted_quantity'];

    public function mealPlan()
    {
        return $this -> belongsTo(UserMealPlan :: class);
    }

    public function recipe()
    {
        return $this -> belongsTo(Recipe :: class);
    }

}
