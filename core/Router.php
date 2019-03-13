<?php

namespace Core;

use Exception;

class Router
{
    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new self;

        require($file);
        
        return $router;
    }

    public static function get($uri, $controller)
    {
        self::$routes['GET'][$uri] = $controller;
    }

    public static function post($uri, $controller)
    {
        self::$routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, self::$routes[$requestType])) {
            return $this->callMethod(
                ...explode('::', self::$routes[$requestType][$uri])
            );
        }

        throw new \Exception('No route defined for this URI');
    }

    protected function callMethod($controller, $method)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $method)) {
            throw new \Exception("{$controller} does not respond to the {$method} method");
        }

        return $controller->$method();
    }
}