<?php 

require __DIR__ . "/../vendor/autoload.php";

use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

$route = new Route();
Dotenv::loadIfLocal();

$route->get(function() {
    return [
        "requestedId" => $_GET['id']
    ];
});