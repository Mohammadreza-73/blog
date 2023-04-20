<?php

use App\Core\Http\Route;

Route::get('/', ['HomeController', 'index'])->middleware('guest');
Route::get('/admin', ['HomeController', 'dashboard'])->middleware('auth');
