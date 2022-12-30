<?php

namespace BorumForum\Questions;

class Question
{
    private static $handler = new QuestionsHandler();

    public static function getWithUserInfo($questionId, $userId)
    {
        return array_merge(
            Question::$handler->getComments($questionId),
            Question::$handler->getQuestionInfo($questionId),
            Question::$handler->getVotes($questionId),
            Question::$handler->getUserVoted($questionId, $userId)
        );
    }

    public function get($questionId)
    {
        $handler = new QuestionsHandler();
        return array_merge(
            $handler->getComments($questionId),
            $handler->getQuestionInfo($questionId),
            $handler->getVotes($questionId)
        );
    }
}
