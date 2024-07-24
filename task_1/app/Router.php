<?php 

namespace App;

use App\Core\FeatureManager;
use App\Core\Flasher;
use App\Helpers\Redirect;

class Router{
    protected $routes = [];
    protected $featureManager;

    public function __construct()
    {
        $this->featureManager = new FeatureManager();
    }

    public function add($path, $callback, $method = 'GET', $feature = null)
    {
        $this->routes[$path][$method] = [
            'callback' => $callback,
            'feature' => $feature
        ];
    }

    public function dispatch($url, $method = 'GET')
    {
        // Check if key exist in route
        if(isset($this->routes[$url][$method])){
            $route = $this->routes[$url][$method];
            $callback = $route['callback'];
            $feature = $route['feature'];

            // Check if feature is not enabled
            if($feature && !$this->featureManager->isFeatureEnabled($feature)){
                Flasher::setFlash('Feature not available', 'error');
                Redirect::to(BASEURL);
                return;
            }

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
            Flasher::setFlash('404 Not Found', 'error');
            Redirect::to(BASEURL);
        }
    }
}

?>