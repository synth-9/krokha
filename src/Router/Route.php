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
        if ($this->method != $method) {
            return false;
        }

        $pathRegex = preg_replace('#\{[\w]+\}#', '([^/]+)', $this->path);
        $pathRegex = "#^" . $pathRegex . "$#";

        if (preg_match($pathRegex, $uri, $matches)) {
            array_shift($matches); // Remove the full URI match
            return $matches;
        }

        return false;
    }

    public function run($params = [])
    {
        if (is_callable($this->action)) {
            return call_user_func_array($this->action, $params);
        }
        return null;
    }
}
