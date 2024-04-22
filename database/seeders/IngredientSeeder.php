<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
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
                ['name' => 'Almond milk', 'calories_per_gram' => 0.59, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.02, 'is_complex_carb' => false, 'is_simple_carb' => true, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Bananas', 'calories_per_gram' => 0.89, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.23, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Flour', 'calories_per_gram' => 3.44, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.72, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Baking powder', 'calories_per_gram' => 1.00, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.25, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Maple syrup', 'calories_per_gram' => 3.67, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.98, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Eggs', 'calories_per_gram' => 1.44, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.10, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Mushrooms', 'calories_per_gram' => 0.22, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Spinach', 'calories_per_gram' => 0.23, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Olive oil', 'calories_per_gram' => 8.82, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 1.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Bacon', 'calories_per_gram' => 5.31, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.50, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Bread', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.53, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Steel-cut oats', 'calories_per_gram' => 3.70, 'protein_per_gram' => 0.13, 'carbs_per_gram' => 0.60, 'fats_per_gram' => 0.08, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Honey', 'calories_per_gram' => 3.65, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.98, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],    ['name' => 'Avocado', 'calories_per_gram' => 1.60, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.15, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Brioche bread', 'calories_per_gram' => 3.80, 'protein_per_gram' => 0.09, 'carbs_per_gram' => 0.41, 'fats_per_gram' => 0.20, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Greek yogurt', 'calories_per_gram' => 0.59, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.10, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Granola', 'calories_per_gram' => 3.70, 'protein_per_gram' => 0.10, 'carbs_per_gram' => 0.60, 'fats_per_gram' => 0.15, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Whole wheat tortilla', 'calories_per_gram' => 2.60, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.50, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Salsa', 'calories_per_gram' => 0.25, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => true, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Peanut butter', 'calories_per_gram' => 5.90, 'protein_per_gram' => 0.26, 'carbs_per_gram' => 0.20, 'fats_per_gram' => 0.50, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Protein powder', 'calories_per_gram' => 4.00, 'protein_per_gram' => 1.00, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Lentils', 'calories_per_gram' => 1.16, 'protein_per_gram' => 0.09, 'carbs_per_gram' => 0.20, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Carrots', 'calories_per_gram' => 0.41, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.09, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Celery', 'calories_per_gram' => 0.12, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Vegetable broth', 'calories_per_gram' => 0.21, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Pizza dough', 'calories_per_gram' => 2.20, 'protein_per_gram' => 0.06, 'carbs_per_gram' => 0.41, 'fats_per_gram' => 0.02, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Bell peppers', 'calories_per_gram' => 0.20, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Olives', 'calories_per_gram' => 1.35, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.05, 'fats_per_gram' => 0.15, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Tomato sauce', 'calories_per_gram' => 0.38, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.08, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Mozzarella cheese', 'calories_per_gram' => 2.71, 'protein_per_gram' => 0.19, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.21, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Chicken breast', 'calories_per_gram' => 1.10, 'protein_per_gram' => 0.21, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.02, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Romaine lettuce', 'calories_per_gram' => 0.15, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Parmesan cheese', 'calories_per_gram' => 3.97, 'protein_per_gram' => 0.32, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.29, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Caesar dressing', 'calories_per_gram' => 4.10, 'protein_per_gram' => 0.05, 'carbs_per_gram' => 0.10, 'fats_per_gram' => 0.43, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Quinoa', 'calories_per_gram' => 3.95, 'protein_per_gram' => 0.14, 'carbs_per_gram' => 0.67, 'fats_per_gram' => 0.06, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Cucumbers', 'calories_per_gram' => 0.16, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Tomatoes', 'calories_per_gram' => 0.18, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Feta cheese', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.17, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.21, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Turkey breast', 'calories_per_gram' => 1.09, 'protein_per_gram' => 0.21, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.02, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Fresh basil', 'calories_per_gram' => 0.23, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Nori seaweed sheets', 'calories_per_gram' => 2.00, 'protein_per_gram' => 0.50, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Salmon', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.20, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.20, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Ground beef', 'calories_per_gram' => 2.41, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.18, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Tortillas', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.53, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Cheese', 'calories_per_gram' => 3.37, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.02, 'fats_per_gram' => 0.28, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => true, 'is_vegan' => false],
                ['name' => 'Pork chops', 'calories_per_gram' => 2.70, 'protein_per_gram' => 0.22, 'carbs_per_gram' => 0.00, 'fats_per_gram' => 0.20, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Apple sauce', 'calories_per_gram' => 0.60, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.16, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Arborio Rice', 'calories_per_gram' => 3.73, 'protein_per_gram' => 0.07, 'carbs_per_gram' => 0.77, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'White wine', 'calories_per_gram' => 0.71, 'protein_per_gram' => 0.00, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00, 'is_complex_carb' => false, 'is_simple_carb' => true, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Tofu', 'calories_per_gram' => 0.62, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Chili powder', 'calories_per_gram' => 3.83, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.77, 'fats_per_gram' => 0.15, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Cumin', 'calories_per_gram' => 3.71, 'protein_per_gram' => 0.18, 'carbs_per_gram' => 0.44, 'fats_per_gram' => 0.22, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Asparagus', 'calories_per_gram' => 0.20, 'protein_per_gram' => 0.02, 'carbs_per_gram' => 0.04, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Pancetta', 'calories_per_gram' => 4.92, 'protein_per_gram' => 0.14, 'carbs_per_gram' => 0.01, 'fats_per_gram' => 0.49, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Garlic', 'calories_per_gram' => 1.50, 'protein_per_gram' => 0.06, 'carbs_per_gram' => 0.33, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Black beans', 'calories_per_gram' => 1.25, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.21, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Strawberries', 'calories_per_gram' => 0.32, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.08, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Blueberries', 'calories_per_gram' => 0.57, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.14, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Rosemary', 'calories_per_gram' => 1.31, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.21, 'fats_per_gram' => 0.05, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Raspberries', 'calories_per_gram' => 0.53, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.11, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Caesar Dressing', 'calories_per_gram' => 2.5, 'protein_per_gram' => 0.05, 'carbs_per_gram' => 0.5, 'fats_per_gram' => 2.0, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => true, 'is_vegetarian' => false, 'is_vegan' => false],
                ['name' => 'Taco Seasoning', 'calories_per_gram' => 3.0, 'protein_per_gram' => 0.1, 'carbs_per_gram' => 0.5, 'fats_per_gram' => 0.2, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Pizza Dough', 'calories_per_gram' => 2.5, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.55, 'fats_per_gram' => 0.05, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Soy Sauce', 'calories_per_gram' => 1.3, 'protein_per_gram' => 0.1, 'carbs_per_gram' => 0.1, 'fats_per_gram' => 0.0, 'is_complex_carb' => false, 'is_simple_carb' => true, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Burger Bun', 'calories_per_gram' => 2.0, 'protein_per_gram' => 0.07, 'carbs_per_gram' => 0.35, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Pasta', 'calories_per_gram' => 1.5, 'protein_per_gram' => 0.05, 'carbs_per_gram' => 0.3, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Vegan Patty', 'calories_per_gram' => 2.8, 'protein_per_gram' => 0.15, 'carbs_per_gram' => 0.2, 'fats_per_gram' => 0.12, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Vegan Mayo', 'calories_per_gram' => 3.0, 'protein_per_gram' => 0.0, 'carbs_per_gram' => 0.2, 'fats_per_gram' => 0.3, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Lemon', 'calories_per_gram' => 0.3, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.1, 'fats_per_gram' => 0.0, 'is_complex_carb' => false, 'is_simple_carb' => true, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Spaghetti', 'calories_per_gram' => 1.8, 'protein_per_gram' => 0.05, 'carbs_per_gram' => 0.35, 'fats_per_gram' => 0.02, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Whole Grain Bread', 'calories_per_gram' => 2.3, 'protein_per_gram' => 0.08, 'carbs_per_gram' => 0.4, 'fats_per_gram' => 0.03, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Lettuce', 'calories_per_gram' => 0.15, 'protein_per_gram' => 0.01, 'carbs_per_gram' => 0.03, 'fats_per_gram' => 0.00, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Pesto Sauce', 'calories_per_gram' => 3.0, 'protein_per_gram' => 0.5, 'carbs_per_gram' => 0.2, 'fats_per_gram' => 0.3, 'is_complex_carb' => false, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true],
                ['name' => 'Broccoli', 'calories_per_gram' => 0.34, 'protein_per_gram' => 0.03, 'carbs_per_gram' => 0.07, 'fats_per_gram' => 0.01, 'is_complex_carb' => true, 'is_simple_carb' => false, 'is_lactose' => false, 'is_vegetarian' => true, 'is_vegan' => true]



                
                
                
            ];

            foreach ($ingredientsData as $ingredient) {
                Ingredient::create($ingredient);
            }
        }
    }