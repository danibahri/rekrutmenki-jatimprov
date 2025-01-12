<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Countdown;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\DocumentController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', [UserController::class, 'show'])->name('home');
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::get('/forgot-password', [UserController::class, 'forgot_password'])->name('forgot.password');
Route::get('/countdown', [UserController::class, 'countdown'])->name('countdown');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/forgot-password', [AuthController::class, 'forgot_password_submit'])->name('forgot.password.submit');

Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'reset_password_submit'])->name('reset.password.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/download/{type}/{id}', [UserController::class, 'downloadFile'])->name('download-file');

Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('download-document/{type}/{id}', [DocumentController::class, 'download'])
        ->name('download.document');
    Route::get('view-document/{type}/{id}', [DocumentController::class, 'viewDocument'])
        ->name('view.document');
    Route::get('/user/{id}/pdf', [UserController::class, 'generatePdf'])->name('user.pdf');
});

Route::middleware(Countdown::class)->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::middleware(CheckAuth::class)->group(function () {
        Route::get('/profile/create', [UserProfileController::class, 'create'])->name('profile.create');
        Route::post('/profile', [UserProfileController::class, 'store'])->name('profile.store');
    });
});
