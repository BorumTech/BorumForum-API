<?php 

require __DIR__ . '/../vendor/autoload.php';

use BorumForum\DBHandlers\PostListHandler;
use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

$env = new DotEnv(__DIR__ . '/../.env');
$env->load();

$route = new Route();

$route->get(function() {
    $handler = new PostListHandler();
    return $handler->list();
});