<?php

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

Route::get('/', function () {
    return view('welcome');
});

// In routes/web.php

Route::get('/age-warning', 'AgeWarningSettingController@index')->name('age-warning.index');
Route::post('/age-warning/toggle', 'AgeWarningSettingController@toggle')->name('age-warning.toggle');

