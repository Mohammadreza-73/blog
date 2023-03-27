<?php

namespace App\Core\Http;

class Router
{
    private array $routes = [];
    private Request $request;
    private $current_route;

    public function __construct()
    {
        $this->request = new Request;
        $this->routes = Route::all();
        $this->current_route = $this->findRoute($this->request);
    }

    public function run()
    {
        // TODO: Implement
    }

    private function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($request->uri === $route['uri'] && $request->method === $route['method']) {
                return $route;
            }
        }

        return null;
    }

    private function dispatch(array $route)
    {
        // TODO: Implement
    }
}