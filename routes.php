<?php

use App\Core\Http\Route;

Route::get('/', ['HomeController', 'index']);
Route::get('/home/{id}', ['HomeController', 'home']);