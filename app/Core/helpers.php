<?php

use App\Core\Http\Response;

if (! function_exists('base_path')) {
    function base_path(string $path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . $path;
    }
}

if (! function_exists('app_path')) {
    function app_path(string $path = '')
    {
        return base_path('app') . DIRECTORY_SEPARATOR . $path;
    }
}

if (! function_exists('config_path')) {
    function config_path()
    {
        return base_path('config');
    }
}

if (! function_exists('resource_path')) {
    function resource_path(string $path = '')
    {
        return base_path('resources') . DIRECTORY_SEPARATOR . $path;
    }
}

if (! function_exists('config')) {
    function config(string $name, string $key = null)
    {
        $config = config_path() . DIRECTORY_SEPARATOR . $name . '.php';

        if (! file_exists($config)) {
            throw new Exception("Config file [$name] not found.");
        }

        $config = require $config;

        if (is_null($key)) {
            return $config;
        }

        return $config[$key] ?? null;
    }
}

if (! function_exists('view')) {
    function view(string $path, array $attributes = [])
    {
        extract($attributes);
        $path = str_replace('.', '/', $path);
        $view = resource_path('views') . DIRECTORY_SEPARATOR . $path . '.php';

        if (! file_exists($view)) {
            throw new Exception("View file [$path] not found.");
        }

        return require $view;
    }
}

if (! function_exists('abort')) {
    function abort(int $code = 404)
    {
        http_response_code($code);

        view("errors/{$code}");

        die();
    }
}

if (! function_exists('dd')) {
    function dd(...$values)
    {
        echo '<pre>';
        var_dump(...$values);
        echo '</pre>';

        die();
    }
}

if (! function_exists('json')) {
    function json(array $data)
    {
        return Response::json($data);
    }
}

if (! function_exists('redirect')) {
    function redirect(string $uri)
    {
        header("Location: {$uri}");
        exit();
    }
}

if (! function_exists('previousUrl')) {
    function previousUrl() {
        return $_SERVER['HTTP_REFERER'] ?? null;
    }
}

if (! function_exists('url')) {
    function url(string $route = '/') {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $route;
    }
}

if (! function_exists('inputs')) {
    function inputs()
    {
        return array_map('trim', $_REQUEST);
    }
}