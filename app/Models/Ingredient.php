<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'calories_per_gram', 'protein_per_gram', 'carbs_per_gram', 'fats_per_gram'];

    public function recipes()
    {
        return $this -> belongsToMany(Recipe :: class, 'recipe_ingredients');
    }

    public function recipeIngredients() {
        return $this -> hasMany(RecipeIngredient :: class);
    }
}
