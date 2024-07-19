<?php

use App\Controllers\BulletinController;
use App\Router;

$router = new Router();

// Routes
$router->add('/', [BulletinController::class, 'index'], 'GET');
$router->add('/add', [BulletinController::class, 'add'], 'POST');

return $router;
?>