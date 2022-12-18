<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\ApiController;

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
Route::get('/token', [ApiController::class, 'DefaultUnauthenticated'])->name('token');
Route::post('/token', [ApiController::class, 'token']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/list', [ApiController::class, 'list']);
});






