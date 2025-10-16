<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckModuleActive;

Route::middleware(['auth:sanctum'])->get('/users', function (Request $request) {
    return $request->user();
});


Route::get('/users', [UserController::class, 'create']);


Route::get('/user_module/{user_id}',[CheckModuleActive::class])
    ->middleware(['auth', 'active'])
    ->name('user_module');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

