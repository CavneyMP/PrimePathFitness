<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Connect recipes with ingredients required and the quantity of each ingredeint.
     */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->id(); // PK
            $table->foreignId('recipe_id')->constrained(); // FK to `recipes`
            $table->foreignId('ingredient_id')->constrained(); // FK to `ingredients`
            $table->float('quantity'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
