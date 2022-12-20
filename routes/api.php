<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\TokenRequestController;

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
Route::get('/token', [TokenRequestController::class, 'DefaultUnauthenticated'])->name('token');
Route::post('/token', [TokenRequestController::class, 'token']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/list', [ApiController::class, 'list']);
});






