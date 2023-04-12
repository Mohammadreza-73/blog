<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('home');
    }

    public function home($id)
    {
        echo $id;
    }
}