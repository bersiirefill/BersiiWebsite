<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\StationApiController;
use App\Http\Controllers\MobileApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/token', [StationApiController::class, 'DefaultUnauthenticated'])->name('token');
// Mobile
Route::post('/login_mobile', [MobileApiController::class, 'login_mobile'])->name('login_mobile');
Route::post('/logout_mobile', [MobileApiController::class, 'logout_mobile'])->name('logout_mobile');
Route::post('/register_mobile', [MobileApiController::class, 'register_mobile'])->name('register_mobile');
// Station
Route::post('/revoke_all', [StationApiController::class, 'revoke_all']);
Route::post('/login_station', [StationApiController::class, 'login_station']);
Route::post('/login_station_admin', [StationApiController::class, 'login_station_admin']);
Route::post('/startup', [StationApiController::class, 'startup']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/revoke_station', [StationApiController::class, 'revoke_station']);
    Route::get('/list', [StationApiController::class, 'list']);
    Route::post('/station_status', [StationApiController::class, 'station_status']);
    Route::post('/change_station_status', [StationApiController::class, 'change_station_status']);
    Route::post('/station_stock', [StationApiController::class, 'station_stock']);
});






