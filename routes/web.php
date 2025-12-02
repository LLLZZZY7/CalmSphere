<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mood-tracker', [App\Http\Controllers\MoodTrackerController::class, 'index'])->name('mood-tracker');
    Route::post('/mood-tracker', [App\Http\Controllers\MoodTrackerController::class, 'store'])->name('mood-tracker.store');
    
    Route::get('/therapy', [App\Http\Controllers\TherapyController::class, 'index'])->name('therapy');
    Route::post('/therapy', [App\Http\Controllers\TherapyController::class, 'store'])->name('therapy.store');
    
    Route::get('/community', [App\Http\Controllers\CommunityController::class, 'index'])->name('community');
    Route::post('/community', [App\Http\Controllers\CommunityController::class, 'store'])->name('community.store');
    
    Route::get('/modules', [App\Http\Controllers\ModulesController::class, 'index'])->name('modules');
    Route::get('/modules/{id}', [App\Http\Controllers\ModulesController::class, 'show'])->name('modules.show');
    Route::post('/modules/{id}/complete', [App\Http\Controllers\ModulesController::class, 'complete'])->name('modules.complete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
