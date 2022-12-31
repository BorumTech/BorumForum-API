<?php

namespace BorumForum\Questions;

use VarunS\PHPSleep\Route;

class QuestionRoute
{
    private QuestionModel $model;

    public function __construct()
    {
        $this->model = new QuestionModel();
        $route = new Route();
        $route->get(function ($request) {
            if ($request->hasHeader("authorization")) {
                return $this->model->getWithUserInfo($_GET['id'], $request->authorize());
            } else {
                return $this->model->get($_GET['id']);
            }
        });
    }
}
