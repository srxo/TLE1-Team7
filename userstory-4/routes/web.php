<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', [SearchController::class, 'index']);
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/details/{id}', [SearchController::class, 'details'])->name('details');
