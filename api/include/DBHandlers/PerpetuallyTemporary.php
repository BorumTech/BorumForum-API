<?php 

namespace BorumForum\DBHandlers;

interface PerpetuallyTemporary {
    /**
     * Creates a new resource
     */
    public function create(object $data);

    /**
     * Deletes the resource
     * @param id Id of the resource
     */
    public function delete(int $id);
}