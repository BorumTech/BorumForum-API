<?php

namespace BorumForum\Questions;

use VarunS\PHPSleep\Route;

class QuestionRoute
{
    private Question $model;

    public function __construct()
    {
        $this->model = new Question();
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

class QuestionsRoute
{
    private Question $model;

    public function __construct()
    {
        $this->model = new Question();
        $route = new Route();
        $route->get(function ($request) {
            return $this->model->list($_GET['min_id']);
        });

        $route->post(function ($request) {
            return $this->model->create($request->authorize(), $_POST);
        });
    }
}
