<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/contacts', [LandingController::class, 'contacts'])->name('contacts');
Route::get('/services', [LandingController::class, 'services'])->name('services');
// Login Sign Up routes
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('daftar', [LoginController::class, 'signup'])->name('daftar');
Route::get('lupa_sandi', [LoginController::class, 'lupa_kata_sandi'])->name('lupa_sandi');
Route::get('verifikasi_kode', [LoginController::class, 'verifikasi_kode'])->name('verifikasi_kode');
Route::post('store_verifikasi', [LoginController::class, 'store_verifikasi'])->name('store_verifikasi');
Route::post('store_forgot', [LoginController::class, 'store_forgot_password'])->name('store_forgot');
Route::post('store_signup', [LoginController::class, 'store_signup'])->name('store_signup');
Route::post('login_action', [LoginController::class, 'login_action'])->name('login_action');
Route::post('login_action_forgot', [LoginController::class, 'login_action_forgot'])->name('login_action_forgot');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    // Supplier
    Route::get('supplier', 'App\Http\Controllers\DashboardController@supplier')->name('supplier');
    Route::post('save_supplier', 'App\Http\Controllers\WarehouseController@new_supplier')->name('save_supplier');
    Route::post('update_supplier', 'App\Http\Controllers\WarehouseController@update_supplier')->name('update_supplier');
    Route::get('delete_supplier', 'App\Http\Controllers\WarehouseController@delete_supplier')->name('delete_supplier');
    // Produk Supplier
    Route::get('produk_supplier', 'App\Http\Controllers\DashboardController@daftar_produk')->name('produk_supplier');
    // Logout
    Route::get('logout_action', 'App\Http\Controllers\LoginController@logout_action')->name('logout_action');
});

// Coba mail
Route::get('email', 'App\Http\Controllers\MailController@index')->name('email');
