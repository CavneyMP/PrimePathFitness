<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * A model for associating recipes with their ingredients and their specific quantities.
 */
class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id',  'ingredient_id', 'quantity']; 


    /**
     * Relationship to Recipe that the ingredient belongs to.
     */
    public function recipe()
    {
        return $this -> belongsTo(Recipe :: class);
    }

    /**
     * Relationship to the Ingredient that is used in the recipe
     */
    public function ingredient()
    {
        return $this -> belongsTo(Ingredient :: class);
    }
}
