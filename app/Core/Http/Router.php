<?php

namespace App\Core\Http;

class Router
{
    private const BASE_CONTROLLER = 'App\\Http\\Controllers\\';
    private array $routes = [];
    private array $parameters = [];
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
        $this->dispatch($this->current_route, $this->parameters);
    }

    private function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($request->uri === $route['uri'] && $request->method === $route['method']) {
                return $route;
            }
        }

        abort();
    }

    private function dispatch(array $current_route, array $parameters = []): void
    {
        $action = $current_route['controller'];

        $class = self::BASE_CONTROLLER . $action[0];
        $method = $action[1];

        $controller = new $class;

        $controller->$method(...$parameters);
    }
}