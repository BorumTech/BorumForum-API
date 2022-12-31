<?php

require __DIR__ . "/../vendor/autoload.php";

use BorumForum\Questions\QuestionRoute;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();
new QuestionRoute();
