<?php

if (! function_exists('base_path')) {
    function base_path(string $path = '')
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . $path;
    }
}

if (! function_exists('config_path')) {
    function config_path(string $filename)
    {
        return base_path('config') . DIRECTORY_SEPARATOR . $filename . '.php';
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