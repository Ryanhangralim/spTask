<?php 
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';

use App\Core\App;

if (!session_id()) {
    session_start();
}

$app = new App();
$app->run();

?>