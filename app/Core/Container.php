<?php

namespace App\Core;

use Closure;

class Container
{
    protected array $bindings = [];

    /**
     * Get class namespace from container
     *
     * @param  string $key
     * @return mixed
     */
    public function resolve(string $key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \InvalidArgumentException("[$key] class does not exist.");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }

    /**
     * Set binding
     *
     * @param  string $key
     * @param  Closure $resolver
     * @return void
     */
    public function bind(string $key, Closure $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Check for binding existance
     *
     * @param  string $key
     * @return boolean
     */
    public function has(string $key)
    {
        return isset($key);
    }
}