<?php

namespace BorumForum\Questions;

class Question
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
            $this->guestHandler->getComments($questionId),
            $this->guestHandler->getQuestionInfo($questionId),
            $this->guestHandler->getVotes($questionId),
            $userHandler->getUserVoted($questionId)
        );
    }

    public function get($questionId)
    {
        return array_merge(
            $this->guestHandler->getComments($questionId),
            $this->guestHandler->getQuestionInfo($questionId),
            $this->guestHandler->getVotes($questionId)
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
}
