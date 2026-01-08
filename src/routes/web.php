<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/directors', [DirectorController::class, 'index'])->name('directors.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');

require __DIR__.'/auth.php';
