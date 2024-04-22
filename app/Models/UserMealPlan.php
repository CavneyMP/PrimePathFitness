<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',  'start_date', 'end_date',  'active']; 

    public function user() 
    {
        return $this -> belongsTo(User :: class);
    }

    public function recipes()
    { 
        return $this -> hasMany(MealPlanRecipe :: class,  'meal_plan_id');
    }
}
