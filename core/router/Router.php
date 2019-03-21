<?php

namespace Core\Router;

class Router
{
    private $routes = [];

    /**
     * Load route file
     *
     * @param string $file
     * @return Router
     */
    public static function load($file)
    {
        $router = new self;

        require($file);
        
        return $router;
    }

    /**
     * Add a GET route
     *
     * @param string $uri
     * @param string $controller
     * @return Route
     */
    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    /**
     * Add a POST route
     *
     * @param string $uri
     * @param string $controller
     * @return Route
     */
    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    /**
     * Routing system depending on the requested method
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        foreach($this->routes[$requestType] as $route) {
            if ($route->match($uri)) {
                return $route->call();
            }
        }

        throw new \Exception('No route defined for this URI');
    }

    /**
     * Add a route
     *
     * @param string $uri
     * @param string $controller
     * @param string $method
     * @return Route
     */
    private function add($uri, $controller, $method)
    {
        $route = new Route($uri, $controller);
        
        $this->routes[$method][] = $route;

        return $route;
    }
}