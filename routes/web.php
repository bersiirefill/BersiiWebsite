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
    return view('index');
});

// Login Sign Up routes
Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('signup', 'App\Http\Controllers\LoginController@signup')->name('signup');
Route::post('store_signup', 'App\Http\Controllers\LoginController@store_signup')->name('store_signup');
