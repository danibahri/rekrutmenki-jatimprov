<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\AuthController;

Route::get('/', [UserController::class, 'show'])->name('home');
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


Route::middleware(CheckAuth::class)->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});