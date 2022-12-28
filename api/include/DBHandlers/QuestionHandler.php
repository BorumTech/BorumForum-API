<?php 

namespace BorumForum\DBHandlers;

class QuestionHandler extends UserKnownHandler implements PerpetuallyTemporary {
    public function __construct($userApiKey) {
        parent::__construct($userApiKey);
    }

    public function list($minId = 0)
    {
        $r = $this->executeQuery("SELECT * FROM questions WHERE id > $minId ORDER BY id DESC LIMIT 50");
        return mysqli_fetch_all($r);
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