<?php

require __DIR__ . '/../vendor/autoload.php';

use BorumForum\Questions\QuestionsRoute;
use VarunS\PHPSleep\Route;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();

$route = new QuestionsRoute();
