<?php

use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'index']);
Route::post('/search', [ItemController::class, 'search'])->name('search');
Route::get('/details/{id}', [ItemController::class, 'details'])->name('details');
