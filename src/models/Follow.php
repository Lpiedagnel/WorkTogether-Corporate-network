<?php

namespace Models;

include_once('src/models/Model.php');

class Follow extends Model
{
    protected $table = "follow";

    public function getFollowing() {

        $userId = $_SESSION['id'];

        $query = "SELECT users.id FROM users LEFT JOIN follow ON users.id = follow.followed_id WHERE follow.follower_id = $userId";

        $items = $this->pdo->query($query)->fetchAll();
        return $items;
    }
    
}