<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('media', MediaController::class)->parameters([
    'media' => 'media'
]);

Route::resource('genres', GenreController::class);

Route::resource('directors', DirectorController::class);

Route::resource('profiles', ProfileController::class);


