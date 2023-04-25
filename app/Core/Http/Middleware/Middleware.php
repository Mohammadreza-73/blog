<?php

namespace App\Core\Http\Middleware;

use App\Core\Exceptions\MiddlewareNotFoundException;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class,
    ];

    public static function resolve(?string $key)
    {
        if (is_null($key)) {
            return;
        }

        $middleware = self::MAP[$key] ?? false;

        if (! $middleware) {
            throw new MiddlewareNotFoundException("Middleware [$key] not found.");
        }

        (new $middleware)->handle();
    }
}