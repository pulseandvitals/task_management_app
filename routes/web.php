<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('board')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\BoardController::class, 'index'])->name('board.index');
    Route::get('/create', [\App\Http\Controllers\BoardController::class, 'create'])->name('board.create');
    Route::post('/', [\App\Http\Controllers\BoardController::class, 'store'])->name('board.store');
    Route::get('/{board}', [\App\Http\Controllers\BoardController::class, 'show'])->name('board.show');
    Route::get('/{board}/edit', [\App\Http\Controllers\BoardController::class, 'edit'])->name('board.edit');
    Route::put('/{board}', [\App\Http\Controllers\BoardController::class, 'update'])->name('board.update');
    Route::delete('/{board}', [\App\Http\Controllers\BoardController::class, 'destroy'])->name('board.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
