<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
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
        ]; 
     }
}
