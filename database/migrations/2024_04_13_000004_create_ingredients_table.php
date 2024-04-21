<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
* Store details for ingredients used in recipes.
*/
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('name'); // Name of ingredient
            $table->float('calories_per_unit'); // Kcal per unit
            $table->float('protein_per_uni'); // 
            $table->float('carbs_per_unit');
            $table->float('fats_per_unit');
            $table->string('unit'); // Mesurements

            // Dietary attributes
            $table->boolean('is_complex_carb')  ->default(false); // Is the ingredient classified as a complex carbohydrate? 
            $table->boolean('is_simple_carb')   ->default(false); // Is the ingredient classified as a simple carb?
            $table->boolean('is_lactose')       ->default(false); // Is the ingredient classified as lactose ingredient?
            $table->boolean('is_vegetarian')    ->default(true); // Is the ingredient classified as vegetarian?
            $table->boolean('is_vegan')         ->default(true); // Is the ingredient classified as vegan?

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
