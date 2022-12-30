<?php

require __DIR__ . "/../vendor/autoload.php";

use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;
use BorumForum\Questions\Question;

$route = new Route();
Dotenv::loadIfLocal();

$route->get(function ($request) {
    $question = new Question();
    if ($request->hasHeader("authorization")) {
        return $question->getWithUserInfo($_GET['id'], $request->authorize());
    } else {
        return $question->get($_GET['id']);
    }
});
