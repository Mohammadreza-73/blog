<?php

namespace App\Http\Controllers;

use App\Core\App;
use App\Core\Http\Response;

class HomeController
{
    private $db;

    public function __construct()
    {
        $this->db = App::resolve('Core\Database');
    }

    public function index()
    {
        return view('home');
    }
}