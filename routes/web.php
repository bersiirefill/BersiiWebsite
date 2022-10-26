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

Route::get('/', 'App\Http\Controllers\LandingController@index')->name('home');
// Login Sign Up routes
Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('daftar', 'App\Http\Controllers\LoginController@signup')->name('daftar');
Route::post('store_signup', 'App\Http\Controllers\LoginController@store_signup')->name('store_signup');
Route::post('login_action', 'App\Http\Controllers\LoginController@login_action')->name('login_action');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    Route::get('logout_action', 'App\Http\Controllers\LoginController@logout_action')->name('logout_action');
});