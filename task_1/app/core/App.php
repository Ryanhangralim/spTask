<?php 
namespace App\Core;

class App{
    protected $controller = 'BulletinController';
    protected $method = 'index';
    protected $params = [];
    protected $router;

    function __construct()
    {
        // Include the routes config
        $this->router = require_once __DIR__ . '/../../routes.php';
    }

    public function run() {
        // Get requested URL path
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        // Dispatch route
        $this->router->dispatch($url, $method);
    }

    public function parseURL()
    {
        if ( isset($_GET["url"]) ){
            $url = rtrim($_GET["url"], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}

?>