<?php 

require __DIR__ . '/../vendor/autoload.php';

use BorumForum\DBHandlers\QuestionHandler;
use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();

$route = new Route();

$route->get(function() {
    $handler = new QuestionHandler();
    return $handler->list();
});