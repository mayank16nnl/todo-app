<?php

namespace Core;

class Container
{
    private static $instance;
    private $registry = [];

    private function __construct() {}

    public static function init()
    {
        if (is_null(static::$instance)) {
            $class_name = static::class;
            static::$instance = new $class_name();
        }

        return static::$instance;
    }

    public function bind($key, $value)
    {
        if (array_key_exists($key, $this->registry)) {
            throw new \Exception("{$key} key already exists");
        }
        
        $this->registry[$key] = $value;
    }

    public function get($key)
    {
        if (! array_key_exists($key, $this->registry)) {
            throw new \Exception("No {$key} is bounded in the container");
        }

        return $this->registry[$key];
    }
}