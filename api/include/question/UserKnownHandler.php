<?php

namespace BorumForum\Questions;

use VarunS\PHPSleep\DBHandlers\DBHandler;

class UserKnownHandler
{
    private $dao;
    private $user;

    public function __construct($userApiKey)
    {
        $this->dao = DBHandler::configDBFromEnv();
        $this->user = $this->dao->getUser($userApiKey);
    }

    public function getUserVoted($questionId)
    {
        $r = $this->dao->executeQuery("SELECT id FROM `user-question-votes` WHERE user_id = {$this->user['id']} AND question_id = $questionId");

        return mysqli_num_rows($r) >= 1;
    }

    public function create($data)
    {
        $subject = $this->dao->sanitizeParam($data['subject']);
        $body = $this->dao->sanitizeParam($data['body']);

        $r = $this->dao->executeQuery("SELECT id FROM questions WHERE subject LIKE '%$subject%' AND body LIKE '%$body%'");
        if (mysqli_num_rows($r) >= 1) {
            throw new \Exception("Duplicate " . mysqli_fetch_array($r)[0]);
        }

        $userId = ($this->user)['id'];
        $r = $this->dao->executeQuery("INSERT INTO questions (user_id, subject, body) VALUES ($userId, '$subject', '$body')");
        if ($this->dao->lastQueryWasSuccessful()) {
            http_response_code(303);
            $insertId = $this->dao->getConnection()->insert_id;
            $protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
            header("Location: $protocol://{$_SERVER['SERVER_NAME']}/questions/$insertId");
            exit();
        }
    }

    public function delete($id)
    {
    }

    /**
     * Votes up a question by inserting/updating it into the `user-message-votes` table
     * @param int $id The id of the question that the user is voting up
     */
    public function voteUp($id)
    {
    }

    /**
     * Votes down a question by inserting/updating it into the `user-message-votes` table
     * @param int $id The id of the question that the user is voting down
     */
    public function voteDown($id)
    {
    }
}
