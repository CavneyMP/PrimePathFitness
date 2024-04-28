<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents ingredients used for the recipes
 * Stores: nutritional information like calories and macros per gram.
 */

class Ingredient extends Model
{
    use HasFactory;

    // Mass assignables
    protected $fillable = ['name', 'calories_per_gram', 'protein_per_gram', 'carbs_per_gram', 'fats_per_gram'];


    /**
     * Define many-to-many relationship with Recipe data  model
     */
    public function recipes()
    {
        // Define many-to-many relationship with pivot data included
        return $this -> belongsToMany(Recipe :: class, 'recipe_ingredients')
            -> withPivot('quantity');
    }
}

