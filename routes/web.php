<?php

use App\Http\Controllers\admins\AuthController as AdminsAuthController;
use App\Http\Controllers\admins\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminsAuthController::class, 'getLogin'])->name('admin.getLogin');
    Route::post('login', [AdminsAuthController::class, 'login'])->name('admin.login');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminsAuthController::class, 'logout'])->name('admin.logout');
    });
});
