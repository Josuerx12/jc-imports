<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home');

// Authentication

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'loginValidate'])->name('loginValidate');

Route::get('/auth/cadastrar-se', [AuthController::class, 'register'])->name('register');
Route::post('/auth/cadastrar-se', [AuthController::class, 'saveRegister'])->name('saveRegister');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
