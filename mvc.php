<?php

class Mvc
{
    private $routes = [];

    public function get($url, $controllerMethod)
    {
        $this->routes['GET'][$url] = $controllerMethod;
    }

    public function post($url, $controllerMethod)
    {
        $this->routes['POST'][$url] = $controllerMethod;
    }

    public function run()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUrl = $_SERVER['REQUEST_URI'];

        // Remove query string from the URL if present
        if (($pos = strpos($requestUrl, '?')) !== false) {
            $requestUrl = substr($requestUrl, 0, $pos);
        }

        if (isset($this->routes[$requestMethod][$requestUrl])) {
            $controllerMethod = $this->routes[$requestMethod][$requestUrl];
            list($controllerName, $methodName) = explode('@', $controllerMethod);

            $controllerFile = 'controllers/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                $controller = new $controllerName();
                $controller->{$methodName}();
            } else {
                echo '404 Not Found';
            }
        } else {
            echo '404 Not Found';
        }
    }
}
