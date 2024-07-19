<?php 

namespace App;

class Router{
    protected $routes = [];

    public function add($route, $callback, $method = 'GET')
    {
        $this->routes[$route][$method] = $callback;
    }

    public function dispatch($url, $method = 'GET')
    {
        // Check if key exist in route
        if(isset($this->routes[$url][$method])){
            $callback = $this->routes[$url][$method];

            // check if callback is an array
            if (is_array($callback)){
                //split controller and method
                // Initiate controller class
                $controller = new $callback[0]();
                $action = $callback[1];
                call_user_func([$controller, $action]);
            } else {
                call_user_func($callback);
            }
        } else {
            echo "404 Not Found";
        }
    }
}

?>