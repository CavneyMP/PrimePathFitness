<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

    
    });

require __DIR__.'/auth.php';
