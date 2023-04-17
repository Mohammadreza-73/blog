<?php

namespace App\Core\Http;

class Response
{
    public const NOT_FOUND = 404;
    public const FORBIDDEN = 403;

    public static function json(array $data)
    {
        self::header();

        return json_encode($data, JSON_PRETTY_PRINT);
    }

    public static function toArray(string $json)
    {
        return json_decode($json, 1);
    }

    private static function header()
    {
        if (! headers_sent()) {
            header('Content-Type: application/json');
        }
    }
}