<?php 

require __DIR__ . '/../vendor/autoload.php';

use BorumForum\DBHandlers\PostListHandler;
use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();

$route = new Route();

$route->get(function() {
    $handler = new PostListHandler();
    return $handler->list();
});