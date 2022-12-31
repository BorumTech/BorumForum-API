<?php

require __DIR__ . "/../vendor/autoload.php";

use BorumForum\Questions\QuestionModel;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();

var_dump(class_exists("QuestionModel"));

new QuestionModel();
