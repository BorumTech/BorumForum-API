<?php 

namespace BorumForum\DBHandlers;

use VarunS\PHPSleep\DBHandlers\DBHandler;

class QuestionsHandler {
    private $dao;

    public function __construct() {
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
}

?>