<?php 
require_once '../vendor/autoload.php';
require_once '../app/config/app.php';
require_once '../app/helpers.php';

use App\Core\Core;

if (!session_id()) {
    session_start();
}

$core = new Core();
$core->run();

?>