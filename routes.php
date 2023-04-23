<?php

use App\Core\Http\Route;

Route::get('/', ['HomeController', 'index'])->middleware('guest');
Route::get('/admin', ['HomeController', 'dashboard'])->middleware('auth');

Route::get('/login', ['AuthController', 'login'])->middleware('guest');
Route::post('/verify', ['AuthController', 'verify'])->middleware('guest');
Route::get('/signup', ['AuthController', 'signup'])->middleware('guest');
Route::post('/register', ['AuthController', 'register'])->middleware('guest');
