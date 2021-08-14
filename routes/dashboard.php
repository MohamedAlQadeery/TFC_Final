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
Route::get('/', 'HomeController@index')->name('index');
Route::resource('categories', 'CategoryController');
Route::resource('attributes', 'AttributeController');
Route::resource('foods', 'FoodController');
Route::resource('sliders', 'SliderController');

Route::post('file-upload', 'FileController@upload')->name('file_upload');
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::post('settings', 'SettingController@store')->name('settings.store');
