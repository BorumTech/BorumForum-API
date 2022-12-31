<?php

require __DIR__ . "/../vendor/autoload.php";

use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;
use BorumForum\Questions\Question;
use BorumForum\Questions\QuestionRoute;

$route = new Route();
Dotenv::loadIfLocal();

new QuestionRoute();
