<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient; // Make sure this model is created
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Ingredient::truncate(); // Clears the ingredients table safely with foreign key checks disabled

        // Enable foreign key checks back
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $ingredientsData = [
            // Breakfast ingredients
            [
                ['name' => 'Almond milk', 'calories_per_gram' => 0.59, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.02],
                ['name' => 'Bananas', 'calories_per_gram' => 0.89, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.23, 'fats_per_gram' => 0.00],
                ['name' => 'Flour', 'calories_per_gram' => 3.44, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.72, 'fats_per_gram' => 0.01],
                ['name' => 'Baking powder', 'calories_per_gram' => 1.00, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.25, 'fats_per_gram' => 0.00],
                ['name' => 'Maple syrup', 'calories_per_gram' => 3.67, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.98, 'fats_per_gram' => 0.00],
                ['name' => 'Eggs', 'calories_per_gram' => 1.44, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.10],
                ['name' => 'Mushrooms', 'calories_per_gram' => 0.22, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00],
                ['name' => 'Spinach', 'calories_per_gram' => 0.23, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00],
                ['name' => 'Olive oil', 'calories_per_gram' => 8.82, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 1.00],
                ['name' => 'Bacon', 'calories_per_gram' => 5.31, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.50],
                ['name' => 'Bread', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.53, 'fats_per_gram' => 0.03],
                ['name' => 'Steel-cut oats', 'calories_per_gram' => 3.70, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.60, 'fats_per_gram' => 0.08],
                ['name' => 'Honey', 'calories_per_gram' => 3.65, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.98, 'fats_per_gram' => 0.00],
                ['name' => 'Avocado', 'calories_per_gram' => 1.60, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.15],
                ['name' => 'Brioche bread', 'calories_per_gram' => 3.80, 'protein_per_gram' => 0.09, 'carbs_per_gram' => 0.41, 'fats_per_gram' => 0.20],
                ['name' => 'Greek yogurt', 'calories_per_gram' => 0.59, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.10],
                ['name' => 'Granola', 'calories_per_gram' => 3.70, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.60, 'fats_per_gram' => 0.15],
                ['name' => 'Whole wheat tortilla', 'calories_per_gram' => 2.60, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.50, 'fats_per_gram' => 0.03],
                ['name' => 'Salsa', 'calories_per_gram' => 0.25, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00],
                ['name' => 'Peanut butter', 'calories_per_gram' => 5.90, 'protein_per_gram' => 0.26, 'carbs_per_gram' => 0.20, 'fats_per_gram' => 0.50],
                ['name' => 'Protein powder', 'calories_per_gram' => 4.00, 'protein_per_gram' => 1.00, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.00],
                ['name' => 'Lentils', 'calories_per_gram' => 1.16, 'protein_per_gram' => 0.09, 'carbs_per_gram' => 0.20, 'fats_per_gram' => 0.00],
                ['name' => 'Carrots', 'calories_per_gram' => 0.41, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.00],
                ['name' => 'Celery', 'calories_per_gram' => 0.12, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.00],
                ['name' => 'Vegetable broth', 'calories_per_gram' => 0.21, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00],
                ['name' => 'Pizza dough', 'calories_per_gram' => 2.20, 'protein_per_gram' => 0.06, 'carbs_per_gram' => 0.41, 'fats_per_gram' => 0.02],
                ['name' => 'Bell peppers', 'calories_per_gram' => 0.20, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00],
                ['name' => 'Olives', 'calories_per_gram' => 1.35, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.15],
                ['name' => 'Tomato sauce', 'calories_per_gram' => 0.38, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.08, 'fats_per_gram' => 0.00],
                ['name' => 'Mozzarella cheese', 'calories_per_gram' => 2.71, 'protein_per_gram' => 0.19, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.21],
                ['name' => 'Chicken breast', 'calories_per_gram' => 1.10, 'protein_per_gram' => 0.21, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.02],
                ['name' => 'Romaine lettuce', 'calories_per_gram' => 0.15, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00],
                ['name' => 'Parmesan cheese', 'calories_per_gram' => 3.97, 'protein_per_gram' => 0.32, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.29],
                ['name' => 'Caesar dressing', 'calories_per_gram' => 4.10, 'protein_per_gram' => 0.05, 'carbs_per_gram' => 0.10, 'fats_per_gram' => 0.43],
                ['name' => 'Quinoa', 'calories_per_gram' => 3.95, 'protein_per_gram' => 0.14, 'carbs_per_gram' => 0.67, 'fats_per_gram' => 0.06],
                ['name' => 'Cucumbers', 'calories_per_gram' => 0.16, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00],
                ['name' => 'Tomatoes', 'calories_per_gram' => 0.18, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00],
                ['name' => 'Feta cheese', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.17, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.21],
                ['name' => 'Turkey breast', 'calories_per_gram' => 1.09, 'protein_per_gram' => 0.21, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.02],
                ['name' => 'Fresh basil', 'calories_per_gram' => 0.23, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.01],
                ['name' => 'Nori seaweed sheets', 'calories_per_gram' => 2.00, 'protein_per_gram' => 0.50, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.00],
                ['name' => 'Salmon', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.20, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.20],
                ['name' => 'Ground beef', 'calories_per_gram' => 2.41, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.18],
                ['name' => 'Tortillas', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.53, 'fats_per_gram' => 0.03],
                ['name' => 'Cheese', 'calories_per_gram' => 3.37, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.28],
                ['name' => 'Pork chops', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.22, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.20],
                ['name' => 'Apple sauce', 'calories_per_gram' => 0.60, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.16, 'fats_per_gram' => 0.00],
                ['name' => 'Arborio rice', 'calories_per_gram' => 3.73, 'protein_per_gram' => 0.07, 'carbs_per_gram' => 0.77, 'fats_per_gram' => 0.01],
                ['name' => 'White wine', 'calories_per_gram' => 0.71, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00],
                ['name' => 'Tofu', 'calories_per_gram' => 0.62, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.03],
                ['name' => 'Chili powder', 'calories_per_gram' => 3.83, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.77, 'fats_per_gram' => 0.15],
                ['name' => 'Cumin', 'calories_per_gram' => 3.71, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.44, 'fats_per_gram' => 0.22],
                ['name' => 'Asparagus', 'calories_per_gram' => 0.20, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00],
                ['name' => 'Pancetta', 'calories_per_gram' => 4.92, 'protein_per_gram' => 0.14, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.49],
                ['name' => 'Garlic', 'calories_per_gram' => 1.50, 'protein_per_gram' => 0.06, 'carbs_per_gram' => 0.33, 'fats_per_gram' => 0.00],
                ['name' => 'Strawberries', 'calories_per_gram' => 0.32, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.08, 'fats_per_gram' => 0.00],
                ['name' => 'Blueberries', 'calories_per_gram' => 0.57, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.14, 'fats_per_gram' => 0.00],
                ['name' => 'Rosemary', 'calories_per_gram' => 1.31, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.21, 'fats_per_gram' => 0.05],
                ['name' => 'Raspberries', 'calories_per_gram' => 0.53, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.11, 'fats_per_gram' => 0.01]
            ]
        ];
        
        foreach ($ingredientsData as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}