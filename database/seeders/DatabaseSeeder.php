<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::query()->delete();

        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    
            // Call other seeders here
        $this->call([
            EquipmentSeeder::class,
            ExerciseSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            RecipeIngredientSeeder::class,
            // Add other seeders if necessary
            ]);
    }
}
