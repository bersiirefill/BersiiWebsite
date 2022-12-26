<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\StationApiController;

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
Route::post('/revoke_all', [StationApiController::class, 'revoke_all']);
Route::post('/login_station', [StationApiController::class, 'login_station']);
Route::post('/startup', [StationApiController::class, 'startup']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/revoke_station', [StationApiController::class, 'revoke_station']);
    Route::get('/list', [StationApiController::class, 'list']);
});






