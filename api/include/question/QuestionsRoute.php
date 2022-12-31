<?php

namespace BorumForum\Questions;

use VarunS\PHPSleep\Route;

class QuestionsRoute
{
    private QuestionModel $model;

    public function __construct()
    {
        $this->model = new QuestionModel();
        $route = new Route();
        $route->get(function ($request) {
            return $this->model->list($_GET['min_id'] ?? 0);
        });

        $route->post(function ($request) {
            return $this->model->create($request->authorize(), $_POST);
        });
    }
}
