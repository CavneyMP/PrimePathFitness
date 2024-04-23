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

        Schema::create('sleep_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // FK to the users table
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('timezone_offset');
            $table->boolean('nap');
            $table->string('score_state');
            $table->json('score'); // Store the entire score object as JSON probably best idea
            /**
             * Example@:
             * "score": {
             *   "stage_summary": {},
             *"sleep_needed": {},
             *"respiratory_rate": 16.11328125,
             *"sleep_performance_percentage": 98,
             *"sleep_consistency_percentage": 90,
             *  *"sleep_efficiency_percentage": 91.6953384
             */

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sleep_data');
    }
};