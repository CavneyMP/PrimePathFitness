<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;

use Illuminate\Support\Facades\DB;

class RecipeIngredientSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipe_ingredients')->delete(); // Clear existing data

        // Example data for Beef Tacos
        $recipeIngredientsData = [
            'Vegan Pancakes' => [
                ['name' => 'Almond milk', 'quantity' => 200], // milliliters
                ['name' => 'Bananas', 'quantity' => 150], // grams
                ['name' => 'Flour', 'quantity' => 100], // grams
                ['name' => 'Baking powder', 'quantity' => 5], // grams
                ['name' => 'Maple syrup', 'quantity' => 50], // grams
            ],
            'Vegetarian Omelette' => [
                ['name' => 'Eggs', 'quantity' => 100], // grams
                ['name' => 'Mushrooms', 'quantity' => 50], // grams
                ['name' => 'Spinach', 'quantity' => 30], // grams
            ],
            'Bacon and Eggs' => [
                ['name' => 'Bacon', 'quantity' => 50], // grams
                ['name' => 'Eggs', 'quantity' => 100], // grams
                ['name' => 'Bread', 'quantity' => 50], // grams
            ],
            // Add all other recipes similarly
            'Beef Tacos' => [
                ['name' => 'Ground beef', 'quantity' => 100], // grams
                ['name' => 'Tortillas', 'quantity' => 100], // grams
                ['name' => 'Cheese', 'quantity' => 30], // grams
                ['name' => 'Salsa', 'quantity' => 50], // grams
            ],

            'Oatmeal with Berries' => [
                ['name' => 'Steel-cut oats', 'quantity' => 100], // grams
                ['name' => 'Honey', 'quantity' => 30], // grams
                ['name' => 'Strawberries', 'quantity' => 50], // grams
                ['name' => 'Blueberries', 'quantity' => 50], // grams
                ['name' => 'Raspberries', 'quantity' => 50], // grams
            ],
            'Avocado Toast' => [
                ['name' => 'Bread', 'quantity' => 100], // grams
                ['name' => 'Avocado', 'quantity' => 100], // grams
            ],
            'French Toast' => [
                ['name' => 'Brioche bread', 'quantity' => 100], // grams
                ['name' => 'Eggs', 'quantity' => 50], // grams
                ['name' => 'Maple syrup', 'quantity' => 50], // grams
            ],
            'Greek Yogurt Parfait' => [
                ['name' => 'Greek yogurt', 'quantity' => 200], // grams
                ['name' => 'Granola', 'quantity' => 50], // grams
                ['name' => 'Honey', 'quantity' => 20], // grams
            ],
            'Breakfast Burrito' => [
                ['name' => 'Whole wheat tortilla', 'quantity' => 100], // grams
                ['name' => 'Eggs', 'quantity' => 100], // grams
                ['name' => 'Salsa', 'quantity' => 50], // grams
            ],
            'Fruit Salad' => [
                ['name' => 'Bananas', 'quantity' => 100], // grams
                ['name' => 'Strawberries', 'quantity' => 50], // grams
                ['name' => 'Blueberries', 'quantity' => 50], // grams
                ['name' => 'Raspberries', 'quantity' => 50], // grams
            ], //10
            'Protein Smoothie' => [
                ['name' => 'Bananas', 'quantity' => 100], // grams
                ['name' => 'Peanut butter', 'quantity' => 30], // grams
                ['name' => 'Protein powder', 'quantity' => 30], // grams
                ['name' => 'Almond milk', 'quantity' => 200], // milliliters
            ],
            'Vegan Lentil Soup' => [
                ['name' => 'Lentils', 'quantity' => 100], // grams
                ['name' => 'Carrots', 'quantity' => 50], // grams
                ['name' => 'Celery', 'quantity' => 50], // grams
                ['name' => 'Vegetable broth', 'quantity' => 500], // milliliters
            ],
            'Vegetarian Pizza' => [
                ['name' => 'Pizza dough', 'quantity' => 200], // grams
                ['name' => 'Tomato sauce', 'quantity' => 100], // grams
                ['name' => 'Bell peppers', 'quantity' => 50], // grams
                ['name' => 'Olives', 'quantity' => 30], // grams
                ['name' => 'Mozzarella cheese', 'quantity' => 100], // grams
            ],
            'Chicken Caesar Salad' => [
                ['name' => 'Chicken breast', 'quantity' => 150], // grams
                ['name' => 'Romaine lettuce', 'quantity' => 100], // grams
                ['name' => 'Parmesan cheese', 'quantity' => 30], // grams
                ['name' => 'Caesar dressing', 'quantity' => 50], // grams
            ],
            'Quinoa Salad' => [
                ['name' => 'Quinoa', 'quantity' => 100], // grams
                ['name' => 'Cucumbers', 'quantity' => 50], // grams
                ['name' => 'Tomatoes', 'quantity' => 50], // grams
                ['name' => 'Feta cheese', 'quantity' => 50], // grams
            ],
            'Turkey Sandwich' => [
                ['name' => 'Whole Grain Bread', 'quantity' => 100], // grams
                ['name' => 'Turkey breast', 'quantity' => 100], // grams
                ['name' => 'Lettuce', 'quantity' => 30], // grams
            ],
            'Tomato Basil Soup' => [
                ['name' => 'Tomato sauce', 'quantity' => 200], // grams
                ['name' => 'Vegetable broth', 'quantity' => 500], // milliliters
                ['name' => 'Fresh basil', 'quantity' => 20], // grams
            ],
            'Sushi Rolls' => [
                ['name' => 'Nori seaweed sheets', 'quantity' => 10], // grams
                ['name' => 'Salmon', 'quantity' => 100], // grams
                ['name' => 'Arborio Rice', 'quantity' => 100], // grams
            ],
            'Beef Stir Fry' => [
                ['name' => 'Ground beef', 'quantity' => 200], // grams
                ['name' => 'Bell peppers', 'quantity' => 100], // grams
                ['name' => 'Soy sauce', 'quantity' => 30], // milliliters (assuming soy sauce is an ingredient)
            ],
            'Pasta Salad' => [
                ['name' => 'Pasta', 'quantity' => 200], // grams (assuming plain pasta is an ingredient)
                ['name' => 'Tomatoes', 'quantity' => 100], // grams
                ['name' => 'Pesto sauce', 'quantity' => 50], // grams (assuming pesto sauce is an ingredient)
            ],
            'Vegan Burger' => [
                ['name' => 'Burger Bun', 'quantity' => 100], // grams (assuming burger buns are an ingredient)
                ['name' => 'Vegan Patty', 'quantity' => 100], // grams (assuming vegan patties are an ingredient)
                ['name' => 'Lettuce', 'quantity' => 30], // grams
                ['name' => 'Tomatoes', 'quantity' => 50], // grams
                ['name' => 'Vegan Mayo', 'quantity' => 30], // grams (assuming vegan mayo is an ingredient)
            ],
            'Vegan Stir Fry' => [
                ['name' => 'Tofu', 'quantity' => 200], // grams
                ['name' => 'Bell peppers', 'quantity' => 200], // grams (assuming bell peppers)
                ['name' => 'Broccoli', 'quantity' => 100], // grams (assuming broccoli)
                ['name' => 'Soy sauce', 'quantity' => 40], // milliliters
            
            ],
            'Vegetarian Chili' => [
                ['name' => 'Black Beans', 'quantity' => 200], // grams (assuming canned or pre-cooked beans are an ingredient)
                ['name' => 'Tomatoes', 'quantity' => 200], // grams
                ['name' => 'Chili powder', 'quantity' => 10], // grams
                ['name' => 'Cumin', 'quantity' => 5], // grams
            ],
            'Grilled Salmon' => [
                ['name' => 'Salmon', 'quantity' => 200], // grams
                ['name' => 'Asparagus', 'quantity' => 100], // grams
                ['name' => 'Olive oil', 'quantity' => 20], // milliliters
                ['name' => 'Lemon', 'quantity' => 30], // grams (assuming lemon is an ingredient)
            ],
            'Spaghetti Carbonara' => [
                ['name' => 'Spaghetti', 'quantity' => 200], // grams (assuming plain spaghetti is an ingredient)
                ['name' => 'Pancetta', 'quantity' => 100], // grams
                ['name' => 'Parmesan cheese', 'quantity' => 50], // grams
                ['name' => 'Eggs', 'quantity' => 100], // grams
            ],
            'Roast Chicken' => [
                ['name' => 'Chicken breast', 'quantity' => 500], // grams (assuming a whole chicken or parts are available)
                ['name' => 'Garlic', 'quantity' => 10], // grams
                ['name' => 'Rosemary', 'quantity' => 5], // grams (assuming rosemary is an ingredient)
                ['name' => 'Olive oil', 'quantity' => 20], // milliliters
            ],
            'Vegan Paella' => [
                ['name' => 'Arborio Rice', 'quantity' => 200], // grams (assuming saffron-infused rice is prepared)
                ['name' => 'Carrots', 'quantity' => 150], // grams
                ['name' => 'Bell peppers', 'quantity' => 150], // grams
                ['name' => 'Tomatoes', 'quantity' => 200], // grams
                ['name' => 'Vegetable broth', 'quantity' => 500], // milliliters
            ],
            
            'Pork Chops' => [
                ['name' => 'Pork chops', 'quantity' => 200], // grams
                ['name' => 'Apple sauce', 'quantity' => 100], // grams
                ['name' => 'Rosemary', 'quantity' => 5], // grams
            ],
            'Mushroom Risotto' => [
                ['name' => 'Arborio Rice', 'quantity' => 200], // grams
                ['name' => 'Mushrooms', 'quantity' => 150], // grams
                ['name' => 'Parmesan cheese', 'quantity' => 50], // grams
                ['name' => 'White wine', 'quantity' => 50], // milliliters
            ],




        ];

        foreach ($recipeIngredientsData as $recipeName => $ingredients) {
            $recipe = Recipe::where('name', $recipeName)->firstOrFail(); // Get the recipe object
            foreach ($ingredients as $ingredientData) {
                try {
                    $ingredient = Ingredient::where('name', $ingredientData['name'])->firstOrFail(); // Get the ingredient object
                } catch (ModelNotFoundException $exception) {
                    // Log the missing ingredient
                    Log::warning("Ingredient '{$ingredientData['name']}' not found for recipe '{$recipeName}'");
                    continue; // Skip adding this ingredient and move to the next one
                }
                // Link ingredient to recipe with quantity
                RecipeIngredient::create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $ingredient->id,
                    'quantity' => $ingredientData['quantity'],
                ]);
            }
        }
    }
}