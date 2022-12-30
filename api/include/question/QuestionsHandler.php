<?php

namespace BorumForum\Questions;

use VarunS\PHPSleep\DBHandlers\DBHandler;

class QuestionsHandler
{
    private $dao;

    public function __construct()
    {
        $this->dao = DBHandler::configDBFromEnv();
    }

    /**
     * List the first 50 questions or the next 50 questions after $minId The id to start after
     * @return array All the questions as an array of associative arrays
     */
    public function list($minId)
    {
        $r = $this->dao->executeQuery("SELECT questions.id, subject, body, date_entered, questions.user_id, users.first_name, users.last_name 
        FROM questions JOIN firstborumdatabase.users ON questions.user_id = users.id 
        WHERE questions.id > $minId ORDER BY questions.id DESC LIMIT 50");
        return mysqli_fetch_all($r, MYSQLI_ASSOC);
    }

    public function getQuestionInfo($id)
    {
        if (!is_numeric($id)) {
            throw new \Exception("Id must be a number");
        }

        $r = $this->dao->executeQuery("SELECT questions.id, questions.user_id, questions.subject, questions.body, questions.date_entered, users.first_name, users.last_name, users.profile_picture FROM questions 
        LEFT OUTER JOIN firstborumdatabase.users ON questions.user_id = users.id WHERE questions.id = $id");

        if (mysqli_num_rows($r) < 1) {
            throw new \Exception("Question Not Found", 404);
        }

        $questionData = $r->fetch_assoc();

        return $questionData;
    }

    public function getVotes($id)
    {
        $r = $this->dao->executeQuery("SELECT SUM(vote) AS vote_count FROM `user-question-votes` WHERE question_id = $id GROUP BY question_id");

        $votes = ["vote_count" => 0];
        if (mysqli_num_rows($r) >= 1) {
            $votes = $r->fetch_assoc();
        }

        return $votes;
    }

    public function getComments($id)
    {
        $r = $this->dao->executeQuery("SELECT body, date_written, user_id, users.first_name, users.last_name FROM `question-comments` JOIN firstborumdatabase.users ON `question-comments`.user_id = users.id WHERE question_id = $id");
        $comments = $r->fetch_all(MYSQLI_ASSOC);

        return $comments;
    }

    public function getUserVoted($questionId, $userId)
    {
        $r = $this->dao->executeQuery("SELECT id FROM `user-question-votes` WHERE user_id = $userId AND question_id = $questionId");

        return mysqli_num_rows($r) >= 1;
    }
}
