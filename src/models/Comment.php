<?php

namespace Models;

include_once('src/models/Model.php');

class Comment extends Model
{
    protected $table = 'comments';

    public function getComments($message_id)
    {
        $allComments = $this->findAll("created_at DESC", "message_id= $message_id");

        return $allComments;
    }
}