<?php

namespace App\Http\Controllers;

use App\Core\App;

class Controller
{
    private $db;

    public function __construct()
    {
        $this->db = App::resolve('Core\Database');
    }

    public function db()
    {
        return $this->db;
    }
}