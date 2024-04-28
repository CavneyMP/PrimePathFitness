<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\MetricsShowController;
use App\Http\Controllers\WorkoutShowController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\MealPlanCreateController;
use App\Http\Controllers\WorkoutCreateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhoopAuthController;
use App\Http\Controllers\MealPlanShowController;
use App\Http\Middleware\EnsureMetricsCompleted;




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
    Route:: get('/workout-overview', [WorkoutShowController::class, 'index'])->name('workout');
    Route:: get('/metrics-overview', [MetricsShowController::class, 'index'])->name ('metrics');
    Route::get('/mealplan-overview', [MealPlanShowController::class, 'showUserMealPlan'])->name('mealplan');

    // Ensure metrics are filled before accessing meal plan creation
    Route::middleware('ensure.metrics.filled')->group(function () {
        Route::get('/mealplan-create', [MealPlanCreateController::class, 'index'])->name('mealplan-create');
        Route::post('/mealplan-create', [MealPlanCreateController::class, 'store'])->name('mealplan-create.store');
    });

    // WorkoutCreate
    Route::get('/workout-create', [WorkoutCreateController::class, 'index'])->name('workout-create'); // Route to view.
    Route::post('/workout-create', [WorkoutCreateController::class, 'store'])->name('workout-create.store'); // Route to store

    // Whoop routes
    Route::get('/auth/whoop', [WhoopAuthController::class, 'redirectToWhoop'])->name('whoop.authorize');
    Route::get('/auth/whoop/callback', [WhoopAuthController::class, 'handleWhoopCallback']);

    });

require __DIR__.'/auth.php';