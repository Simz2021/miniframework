<?php
class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function handleRequest($method, $path)
    {
        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            if (is_callable($callback)) {
                // Invoke the callback function
                $callback();
            } else {
                // Handle controller and method
                list($controller, $method) = explode('@', $callback);
                $this->invokeControllerMethod($controller, $method);
            }
        } else {
            // Handle 404 Not Found
            $this->handleNotFound();
        }
    }

    private function invokeControllerMethod($controller, $method)
    {
        // Instantiate the controller
        $controllerInstance = new $controller();

        // Call the method on the controller instance
        $controllerInstance->$method();
    }

    private function handleNotFound()
    {
        // Handle 404 Not Found response
        echo '404 Not Found';
    }
}

