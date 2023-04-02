<?php

namespace App\Core\Http;

use App\Core\Exceptions\ClassNotFoundException;
use App\Core\Exceptions\MethodNotFoundException;

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
        // dd($this->current_route);
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

        if (! class_exists($class)) {
            throw new ClassNotFoundException("Controller [$class] not exists.");
        }

        $method = $action[1];

        if (! method_exists($class, $method)) {
            throw new MethodNotFoundException("Method [$method], in controller [$class] not found.");
        }

        $controller = new $class;

        $controller->$method(...$parameters);
    }
}