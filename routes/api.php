<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/user', [\App\Http\Controllers\UserControllerApi::class, 'index']);
    Route::get('/user/{id}', [\App\Http\Controllers\UserControllerApi::class, 'show']);

    Route::get('/task', [\App\Http\Controllers\TaskControllerApi::class, 'index']);
    Route::get('/task/{id}', [\App\Http\Controllers\TaskControllerApi::class, 'show']);

    Route::get('/logout', [AuthConroller::class, 'logout']);
});
