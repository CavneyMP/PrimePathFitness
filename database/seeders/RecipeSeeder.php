<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Recipe::truncate(); // Clears the recipes table safely with foreign key checks disabled

        // Enable foreign key checks back
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $recipesData = [
            // Breakfast recipes
            ['name' => 'Vegan Pancakes', 'description' => 'Fluffy pancakes made with almond milk and bananas.', 'mealtype' => 'breakfast'],
            ['name' => 'Vegetarian Omelette', 'description' => 'Egg omelette filled with mushrooms and spinach.', 'mealtype' => 'breakfast'],
            ['name' => 'Bacon and Eggs', 'description' => 'Classic bacon and eggs with a side of toast.', 'mealtype' => 'breakfast'],
            ['name' => 'Oatmeal with Berries', 'description' => 'Steel-cut oats with fresh berries and honey.', 'mealtype' => 'breakfast'],
            ['name' => 'Avocado Toast', 'description' => 'Whole grain bread topped with smashed avocado.', 'mealtype' => 'breakfast'],
            ['name' => 'French Toast', 'description' => 'French toast made with brioche and maple syrup.', 'mealtype' => 'breakfast'],
            ['name' => 'Greek Yogurt Parfait', 'description' => 'Greek yogurt layered with granola and honey.', 'mealtype' => 'breakfast'],
            ['name' => 'Breakfast Burrito', 'description' => 'Whole wheat burrito filled with scrambled eggs and salsa.', 'mealtype' => 'breakfast'],
            ['name' => 'Fruit Salad', 'description' => 'Mixed fruit salad with a variety of seasonal fruits.', 'mealtype' => 'breakfast'],
            ['name' => 'Protein Smoothie', 'description' => 'Protein-packed smoothie with banana and peanut butter.', 'mealtype' => 'breakfast'],

            // Lunch recipes
            ['name' => 'Vegan Lentil Soup', 'description' => 'Hearty lentil soup with carrots and celery.', 'mealtype' => 'lunch'],
            ['name' => 'Vegetarian Pizza', 'description' => 'Pizza topped with bell peppers and olives.', 'mealtype' => 'lunch'],
            ['name' => 'Chicken Caesar Salad', 'description' => 'Romaine lettuce with chicken, parmesan, and Caesar dressing.', 'mealtype' => 'lunch'],
            ['name' => 'Quinoa Salad', 'description' => 'Quinoa with cucumbers, tomatoes, and feta cheese.', 'mealtype' => 'lunch'],
            ['name' => 'Turkey Sandwich', 'description' => 'Whole grain bread with turkey breast and lettuce.', 'mealtype' => 'lunch'],
            ['name' => 'Tomato Basil Soup', 'description' => 'Creamy tomato soup with fresh basil.', 'mealtype' => 'lunch'],
            ['name' => 'Sushi Rolls', 'description' => 'Fresh sushi rolls with salmon and avocado.', 'mealtype' => 'lunch'],
            ['name' => 'Beef Stir Fry', 'description' => 'Beef stir-fry with broccoli and bell peppers.', 'mealtype' => 'lunch'],
            ['name' => 'Pasta Salad', 'description' => 'Pasta salad with cherry tomatoes and pesto sauce.', 'mealtype' => 'lunch'],
            ['name' => 'Vegan Burger', 'description' => 'Vegan burger with lettuce, tomato, and vegan mayo.', 'mealtype' => 'lunch'],

            // Dinner recipes
            ['name' => 'Vegan Stir Fry', 'description' => 'Tofu stir-fry with a variety of vegetables.', 'mealtype' => 'dinner'],
            ['name' => 'Vegetarian Chili', 'description' => 'Bean chili with tomatoes and spices.', 'mealtype' => 'dinner'],
            ['name' => 'Grilled Salmon', 'description' => 'Grilled salmon with a side of asparagus.', 'mealtype' => 'dinner'],
            ['name' => 'Spaghetti Carbonara', 'description' => 'Spaghetti with creamy sauce and pancetta.', 'mealtype' => 'dinner'],
            ['name' => 'Roast Chicken', 'description' => 'Roasted chicken with herbs and garlic.', 'mealtype' => 'dinner'],
            ['name' => 'Vegan Paella', 'description' => 'Paella made with saffron rice and mixed vegetables.', 'mealtype' => 'dinner'],
            ['name' => 'Beef Tacos', 'description' => 'Tacos filled with ground beef, cheese, and salsa.', 'mealtype' => 'dinner'],
            ['name' => 'Pork Chops', 'description' => 'Pork chops with apple sauce and steamed veggies.', 'mealtype' => 'dinner'],
            ['name' => 'Mushroom Risotto', 'description' => 'Creamy risotto with Porcini mushrooms.', 'mealtype' => 'dinner'],
        ];

        foreach ($recipesData as $recipe) {
            Recipe::create($recipe);
        }
    }
}
