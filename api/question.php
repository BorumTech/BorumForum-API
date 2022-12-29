<?php 

require __DIR__ . "/../vendor/autoload.php";

use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;
use BorumForum\DBHandlers\QuestionsHandler;

$route = new Route();
Dotenv::loadIfLocal();

$route->get(function($request) {
    $handler = new QuestionsHandler();
    return $handler->get($_GET['id']);
});
