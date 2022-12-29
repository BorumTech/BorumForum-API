<?php 

require __DIR__ . '/../vendor/autoload.php';

use BorumForum\DBHandlers\QuestionHandler;
use BorumForum\DBHandlers\QuestionsHandler;
use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();

$route = new Route();

$route->get(function($request) {
    $handler = new QuestionsHandler();
    return $handler->list($_GET['min_id'] ?? 0);
});

$route->post(function($request) {
    try {
        $handler = new QuestionHandler($request->authorize());
        return $handler->create($_POST);
    } catch (\Exception $e) {
        return [
            "error" => [
                "message" => $e->getMessage()
            ]
        ];
    }
});