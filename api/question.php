<?php 

require __DIR__ . "/../vendor/autoload.php";

use VarunS\PHPSleep\Route;
use BorumForum\DBHandlers\QuestionHandler;

$route = new Route();
$handler = new QuestionHandler();

$route->get(function() {
    return [
        "requestedId" => $_GET['id']
    ];
});