<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_metrics', function (Blueprint $table) {
            $table -> float('bmi') -> nullable();
            $table -> float('bmr') -> nullable();
            $table -> float('tdee') -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_metrics', function (Blueprint $table) {
            $table -> dropColumn (['bmi', 'bmr', 'tdee']);
        });
    }
};
