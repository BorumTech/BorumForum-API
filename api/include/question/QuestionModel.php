<?php

namespace BorumForum\Questions;

use Exception;

class QuestionModel
{

    private $guestHandler;

    function __construct()
    {
        $this->guestHandler = new GuestHandler();
    }

    public function getWithUserInfo($questionId, $userApiKey)
    {
        $userHandler = new UserKnownHandler($userApiKey);

        return array_merge(
            $this->guestHandler->getQuestionInfo($questionId),
            $this->guestHandler->getVotes($questionId),
            $userHandler->getUserVoted($questionId),
            ["comments" => $this->guestHandler->getComments($questionId)]
        );
    }

    public function get($questionId)
    {
        return array_merge(
            $this->guestHandler->getQuestionInfo($questionId),
            $this->guestHandler->getVotes($questionId),
            ["comments" => $this->guestHandler->getComments($questionId)]
        );
    }

    public function list(int $minId)
    {
        return $this->guestHandler->list($minId);
    }

    public function create($userApiKey, $data)
    {
        $handler = new UserKnownHandler($userApiKey);
        return $handler->create($data);
    }

    public function delete(string $userApiKey, int $id)
    {
        $handler = new UserKnownHandler($userApiKey);
        $question = $handler->getQuestion($id);

        if (!$question) {
            throw new Exception('Question not found', 404);
        }

        if ($question['user_authored']) {
            return $handler->delete($id) || throw new Exception("An internal server error occurred", 500);
        }
    }
}
