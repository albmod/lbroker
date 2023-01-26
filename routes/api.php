<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgetController;
use App\Http\Controllers\Api\Auth\ResetController;
use App\Http\Controllers\Api\Auth\UserController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgetpassword',[ForgetController::class, 'forgetpassword']);
Route::post('/resetpassword',[ResetController::class, 'resetpassword']);
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');
