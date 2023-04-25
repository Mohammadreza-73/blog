<?php

namespace App\Core\Http;

class Request
{
    private array $request = [];

    public function __construct()
    {
        $this->request['uri'] = strtok($_SERVER['REQUEST_URI'], '?');
        $this->request['method'] = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $this->request['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->request['params'] = $_REQUEST;
    }

    public function all()
    {
        return $this->request;
    }

    public function __get(string $key)
    {
        return $this->request[$key] ?? null;
    }
}