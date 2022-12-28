<?php 

require '/../vendor/autoload.php';

use BorumForum\DBHandlers\QuestionHandler;
use BorumForum\Route;

$route = new Route();
$handler = new QuestionHandler($route->apiKey);

$route->get(function() {
    $handler->list();
});