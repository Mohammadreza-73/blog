<?php

use App\Core\Http\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/admin', [HomeController::class, 'dashboard'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/verify', [AuthController::class, 'verify'])->middleware('guest');
Route::get('/signup', [AuthController::class, 'signup'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
