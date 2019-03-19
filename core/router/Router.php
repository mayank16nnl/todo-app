<?php

namespace Core\Router;

class Router
{
    private $routes = [];

    public static function load($file)
    {
        $router = new self;

        require($file);
        
        return $router;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function direct($uri, $requestType)
    {
        foreach($this->routes[$requestType] as $route) {
            if ($route->match($uri)) {
                return $route->call();
            }
        }

        throw new \Exception('No route defined for this URI');
    }

    private function add($uri, $controller, $method)
    {
        $route = new Route($uri, $controller);
        
        $this->routes[$method][] = $route;

        return $route;
    }
}