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


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);


Route::group(['middleware' => ['auth:sanctum']], function (){

    Route::get('/info', function (Request $request){
        return $request->user();
    });

    Route::middleware(['admin'])->group(function () {
    Route::get('/user', [\App\Http\Controllers\UserControllerApi::class, 'index']);
    Route::get('/user/{id}', [\App\Http\Controllers\UserControllerApi::class, 'show']);
    });

    Route::get('/task', [\App\Http\Controllers\TaskControllerApi::class, 'index2']);
    Route::get('/task_all', [\App\Http\Controllers\TaskControllerApi::class, 'index']);
    Route::get('/task_total', [\App\Http\Controllers\TaskControllerApi::class, 'total']);

    Route::get('/task/{id}', [\App\Http\Controllers\TaskControllerApi::class, 'show']);

    Route::post('/new', [\App\Http\Controllers\TaskControllerApi::class, 'store']);

});


