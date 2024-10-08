<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/index',[
    UserController::class,
    'index'
]);
Route::get('users/create',[
    UserController::class,
    'create'
]);
Route::post('users/create',[
    UserController::class,
    'postCreate'
]);
Route::get('users/get-user/{id}',[
    UserController::class,
    'getUser'
]);
Route::put('users/edit/{id}',[
    UserController::class,
    'editUser'
]);
Route::delete('users/delete/{id}',[
    UserController::class,
    'delete'
]);
