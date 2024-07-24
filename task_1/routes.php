<?php

use App\Controllers\BulletinController;
use App\Router;

$router = new Router();

// Routes
$router->add('/', [BulletinController::class, 'index'], 'GET', 'bulletin_show');
$router->add('/add', [BulletinController::class, 'add'], 'POST', 'bulletin_add');

return $router;
?>