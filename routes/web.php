<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'getHome'])->name('home');
