<?php 
namespace App\Core;

class Core{
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

}

?>