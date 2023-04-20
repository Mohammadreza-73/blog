<?php

namespace App\Core\Http\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class,
    ];

    public static function resolve(string $key)
    {
        $middleware = self::MAP[$key] ?? false;

        if (! $middleware) {
            throw new \InvalidArgumentException("Middleware [$key] not found.");
        }

        (new $middleware)->handle();
    }
}