<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Requirs Eloquent model

// Recipe model class, extends Eloquent allowing interaction with databases.

class Recipe extends Model
{
    use HasFactory;

    // Mass assigable attributes needed for meal planner.
    protected $fillable = [ 'name', 'description', 'mealtype' ];  // $fillable property = ables mass assignment attributes from model

    // Defining the Relationship with RecipeIngredient table
    public function ingredients() // Defines a method from Eloquent
    {
        return $this -> hasMany(RecipeIngredient::class); // hasMany method defines a one-to-many relationship. 1 Recipe has many RecipeIngredients
    }
    
}
