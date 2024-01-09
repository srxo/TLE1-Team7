<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('games.create');
//});

Route::resource('games', GameController::class);

Auth::routes();

Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Put all routes here that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [\App\Http\Controllers\UserController :: class, 'index'])->name('user.index');
});


//Put all admin routes here
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/create', [GameController::class, 'create'])->name('game.create');
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
});

//Route::get('/', function () {
//    return view('colors');
//});
