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

Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->middleware('auth');

Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show'])->middleware('auth');

Route::get('/task', [\App\Http\Controllers\TaskController::class, 'index'])->middleware('auth');

Route::post('/task', [\App\Http\Controllers\TaskController::class, 'store'])->middleware('auth');

Route::get('/task/create', [\App\Http\Controllers\TaskController::class, 'create'])->middleware('auth');

Route::get('/task/edit/{id}', [\App\Http\Controllers\TaskController::class, 'edit'])->middleware('auth');

Route::post('/task/update/{id}', [\App\Http\Controllers\TaskController::class, 'update'])->middleware('auth');

Route::get('/task/destroy/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])->middleware('auth');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);

Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/error', function (){
    return view('error', ['message' => session('message')]);
});
