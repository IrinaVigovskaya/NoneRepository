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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/task', [\App\Http\Controllers\TaskController::class, 'index']);

Route::get('/task/create', [\App\Http\Controllers\TaskController::class, 'create']);

Route::post('/task', [\App\Http\Controllers\TaskController::class, 'store']);

Route::get('/task/edit/{id}', [\App\Http\Controllers\TaskController::class, 'edit']);

Route::post('/task/update/{id}', [\App\Http\Controllers\TaskController::class, 'update']);

Route::get('/task/destroy/{id}', [\App\Http\Controllers\TaskController::class, 'destroy']);
