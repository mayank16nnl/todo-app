<?php

namespace Core;

class Container
{
    private static $instance;
    private $registry = [];

    private function __construct() {}

    /**
     * Instantiate container
     *
     * @return Container
     */
    public static function init()
    {
        if (is_null(static::$instance)) {
            $class_name = static::class;
            static::$instance = new $class_name();
        }

        return static::$instance;
    }

    /**
     * Bind a container's element
     *
     * @param string $key
     * @param mixed $value
     */
    public function bind($key, $value)
    {
        if (array_key_exists($key, $this->registry)) {
            throw new \Exception("{$key} key already exists");
        }
        
        $this->registry[$key] = $value;
    }

    /**
     * Get a container's element
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if (! array_key_exists($key, $this->registry)) {
            throw new \Exception("No {$key} is bounded in the container");
        }

        return $this->registry[$key];
    }
}