<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;


/**
 * Factory for creating fake instances of Ingredient data model.
 * Providing a way to generate test data
 */
class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    /**
     * Define the model's default state with random values for ingredient.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
     {
        return [
            'name' =>                $this -> faker -> word() , // The ingredient, other fields are explanitory.
            'calories_per_gram' =>   $this -> faker -> randomFloat(2, 0.1, 1),
            'protein_per_gram' =>    $this -> faker -> randomFloat(1, 0,  0.5), 
            'carbs_per_gram'  =>     $this -> faker -> randomFloat(1, 0, 0.5) ,  
            'fats_per_gram' =>       $this -> faker -> randomFloat(1, 0, 0.5),
            'is_complex_carb' =>     $this -> faker -> boolean,
            'is_simple_carb' =>      $this -> faker -> boolean,
            'is_lactose' =>          $this -> faker -> boolean ,
            'is_vegetarian' =>       $this -> faker -> boolean,
            'is_vegan' =>            $this -> faker -> boolean
        ]; 
     }
}
