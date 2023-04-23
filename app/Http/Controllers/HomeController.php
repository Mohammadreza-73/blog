<?php

namespace App\Http\Controllers;

use App\Core\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        echo 'admin dashboard';
    }
}