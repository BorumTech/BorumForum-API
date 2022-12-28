<?php 

namespace BorumForum\DBHandlers;

use VarunS\PHPSleep\DBHandlers\DBHandler;

class QuestionHandler {
    private $dao;

    public function __construct() {
        $this->dao = DBHandler::configDBFromEnv();
    }

    /**
     * List the first 50 questions or the next 50 questions after $minId The id to start after
     * @return array All the questions as an array of associative arrays
     */
    public function list($minId = 0)
    {
        $r = $this->dao->executeQuery("SELECT * FROM questions WHERE id > $minId ORDER BY id DESC LIMIT 10");
        return mysqli_fetch_all($r, MYSQLI_ASSOC);
    }

    public function create($data) {
        
    }

    public function delete($id) {
        
    }

    /**
     * Votes up a question by inserting/updating it into the `user-message-votes` table
     * @param int $id The id of the question that the user is voting up
     */
    public function voteUp($id) {

    }

    /**
     * Votes down a question by inserting/updating it into the `user-message-votes` table
     * @param int $id The id of the question that the user is voting down
     */
    public function voteDown($id) {

    }
}

?>