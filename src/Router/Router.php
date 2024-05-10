<?php

namespace App\Router;

class Router
{
    private $routes = [];

    public function add($method, $path, $action)
    {
        $this->routes[] = new Route($method, $path, $action);
    }

    public function dispatch($requestUri, $requestMethod)
    {
        foreach ($this->routes as $route) {
            if ($route->matches($requestUri, $requestMethod)) {
                return $route->run();
            }
        }
        header("HTTP/1.1 404 Not Found");
        return "404 Not Found";
    }
}
