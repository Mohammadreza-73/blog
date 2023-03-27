<?php

namespace App\Core;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind(string $key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve(string $key)
    {
        return static::container()->resolve($key);
    }
}