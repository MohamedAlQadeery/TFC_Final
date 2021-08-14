<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('test', function () {});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lang/{lang?}', 'App\Http\Controllers\Dashboard\LangController@change')->name('dashboard.lang');

Route::get('/', 'App\Http\Controllers\Web\WebController@index')->name('web.home');
Route::post('/sendorder', 'App\Http\Controllers\Web\WebController@sendOrder')->name('web.sendOrder');
