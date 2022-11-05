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

Route::get('/emailverif', function(){
    return view('dashboard.emailverif');
});

Route::get('/', 'App\Http\Controllers\LandingController@index')->name('home');
Route::get('/contacts', function(){
    return view('contacts');
});
// Login Sign Up Forgot routes
Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('daftar', 'App\Http\Controllers\LoginController@signup')->name('daftar');
Route::get('lupa_sandi', 'App\Http\Controllers\LoginController@lupa_kata_sandi')->name('lupa_sandi');
Route::post('store_forgot', 'App\Http\Controllers\LoginController@store_forgot_password')->name('store_forgot');
Route::post('store_signup', 'App\Http\Controllers\LoginController@store_signup')->name('store_signup');
Route::post('login_action', 'App\Http\Controllers\LoginController@login_action')->name('login_action');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    Route::get('logout_action', 'App\Http\Controllers\LoginController@logout_action')->name('logout_action');
});

// Coba mail
Route::get('email', 'App\Http\Controllers\MailController@index')->name('email');