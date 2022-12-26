<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\MailController;
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
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Supplier
    Route::get('supplier', [DashboardController::class, 'supplier'])->name('supplier');
    Route::post('save_supplier', [WarehouseController::class, 'new_supplier'])->name('save_supplier');
    Route::put('update_supplier', [WarehouseController::class, 'update_supplier'])->name('update_supplier');
    Route::delete('delete_supplier/{kode_supplier}', [WarehouseController::class, 'delete_supplier'])->name('delete_supplier');
    // Produk Supplier
    Route::get('produk_supplier', [DashboardController::class, 'daftar_produk'])->name('produk_supplier');
    Route::post('save_produk', [WarehouseController::class, 'new_product'])->name('save_produk');
    // Administration
    Route::get('administrator', [DashboardController::class, 'daftar_administrator'])->name('administrator');
    Route::post('save_admin', [UserController::class, 'new_admin'])->name('save_admin');
    Route::put('update_admin', [UserController::class, 'update_admin'])->name('update_admin');
    Route::delete('delete_admin/{id_admin}', [UserController::class, 'delete_admin'])->name('delete_admin');
    // User
    Route::get('pengguna', [DashboardController::class, 'daftar_pengguna'])->name('pengguna');
    Route::put('reset_pengguna/{id}', [UserController::class, 'reset_pengguna'])->name('reset_pengguna');
    Route::delete('delete_pengguna/{id}', [UserController::class, 'delete_pengguna'])->name('delete_pengguna');
    // Station
    Route::get('station', [DashboardController::class, 'station'])->name('station');
    Route::post('save_station', [StationController::class, 'new_station'])->name('save_station');
    // Logout
    Route::get('logout_action', [LoginController::class, 'logout_action'])->name('logout_action');
});

// Coba mail
Route::get('email', [MailController::class, 'index'])->name('email');
