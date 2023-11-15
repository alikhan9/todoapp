<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->middleware(['auth', 'verified']);
Route::post('/task/create', [TaskController::class, 'store'])->middleware(['auth', 'verified']);
Route::delete('/task/delete/{task}', [TaskController::class, 'delete'])->middleware(['auth', 'verified']);
Route::post('/task/toggle/{task}', [TaskController::class, 'toggle'])->middleware(['auth', 'verified']);
Route::post('/task/update/{task}', [TaskController::class, 'update'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
