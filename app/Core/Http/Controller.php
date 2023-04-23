<?php

namespace App\Core\Http;

use App\Core\App;

class Controller
{
    private static $db = null;

    public function __construct()
    {
        static::$db = App::resolve('Core\Database');
    }

    public function db()
    {
        return static::$db;
    }
}