<?php

namespace App\Core\Http;

class Route
{
    private static array $routes = [];

    /**
     * Add routes
     *
     * @param  string $method
     * @param  string $uri
     * @param  Closure|string|array $controller
     * @return void
     */
    public static function add(string $method, string $uri, $controller)
    {
        self::$routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
        ];
    }

    public static function get(string $uri, $controller)
    {
        return self::add('GET', $uri, $controller);
    }

    public static function post(string $uri, $controller)
    {
        return self::add('POST', $uri, $controller);
    }

    public static function put(string $uri, $controller)
    {
        return self::add('PUT', $uri, $controller);
    }

    public static function patch(string $uri, $controller)
    {
        return self::add('PATCH', $uri, $controller);
    }

    public static function delete(string $uri, $controller)
    {
        return self::add('DELETE', $uri, $controller);
    }

    public static function all()
    {
        return self::$routes;
    }
}