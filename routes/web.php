<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;

Auth::routes();


//Route::get('/', [ItemController::class, 'index']);
//Route::post('/search', [ItemController::class, 'search'])->name('search');
//Route::get('/details/{id}', [ItemController::class, 'details'])->name('details');

Route::middleware(['auth'])->group(function () {
    Route::get('/games', [GamesController::class, 'index'])->name('games.index');
});
