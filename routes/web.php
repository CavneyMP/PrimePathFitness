<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\MetricsPageController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\MealPlanCreateController;
use App\Http\Controllers\WorkoutCreateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhoopAuthController;
use App\Http\Controllers\MealPlanShowController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to metrics view.
    Route::get('/metrics', function () {
        return view('metrics.form');
    })->name('metrics.form');

    // Route for post, to store metrics from intial form 
    Route::post('/metrics', [MetricsController::class, 'store'])->name('metrics.store');

    // Routes for three main pages
    Route:: get('/workout-overview', [WorkoutController::class, 'index'])->name('workout');
    // old meal plan route..
    // Route:: get('/mealplan', [MealPlanShowController::class,'index'])->name('meal');
    Route:: get('/metrics-overview', [MetricsPageController::class, 'index'])->name ('metrics');

// Existing Meal Plan or related task handling
Route::get('/mealplan-overview', [MealPlanShowController::class, 'showUserMealPlan'])
    ->name('mealplan');



    // WorkoutCreate
    Route::get('/workout-create', [WorkoutCreateController::class, 'index'])->name('workout-create'); // Route to view.
    Route::post('/workout-create', [WorkoutCreateController::class, 'store'])->name('workout-create.store'); // Route to store

    // MealPlanCreate
    Route::get('/mealplan-create', [MealPlanCreateController::class, 'index'])->name('mealplan-create'); // Route to view.
    Route::post('/mealplan-create', [MealPlanCreateController::class, 'store'])->name('mealplan-create.store'); // Route to store

    // Whoop
    Route::get('/auth/whoop', [WhoopAuthController::class, 'redirectToWhoop'])->name('whoop.authorize');
    Route::get('/auth/whoop/callback', [WhoopAuthController::class, 'handleWhoopCallback']);


    });

require __DIR__.'/auth.php';