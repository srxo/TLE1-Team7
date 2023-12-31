<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;

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

//Put all admin routes here
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::delete('/admin/remove-admin/{id}', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::post('/user/{id}/suspend', [AdminController::class, 'suspendUser'])->name('user.suspend');
});

//Route::get('/', function () {
//    return view('colors');
//});
