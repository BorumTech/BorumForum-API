<?php

require __DIR__ . "/../vendor/autoload.php";

use BorumForum\Questions\QuestionModel;
use VarunS\PHPSleep\DotEnv;

DotEnv::loadIfLocal();
new QuestionModel();
