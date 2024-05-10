<?php

namespace App\Router;

class Route
{
    private $method;
    private $path;
    private $action;

    public function __construct($method, $path, $action)
    {
        $this->method = $method;
        $this->path = $path;
        $this->action = $action;
    }

    public function matches($uri, $method)
    {
        $pathRegex = preg_replace('#\{[\w]+\}#', '([^/]+)', $this->path);
        $pathRegex = "#^" . $pathRegex . "$#";

        if ($this->method == $method && preg_match($pathRegex, $uri, $matches)) {
            array_shift($matches); // Remove the full URI match
            return $this->run($matches);
        }
        return false;
    }

    public function run($params = [])
    {
        if (is_callable($this->action)) {
            return call_user_func_array($this->action, $params);
        } elseif (is_string($this->action)) {
            // Assuming the action string is in the format 'Controller@method'
            [$controllerName, $methodName] = explode('@', $this->action, 2);
            $controller = new $controllerName();
            return call_user_func_array([$controller, $methodName], $params);
        }
        return null;
    }
}
