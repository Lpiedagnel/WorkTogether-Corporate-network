<?php

namespace Models;

include_once('src/models/Model.php');

class Follow extends Model
{
    protected $table = "follow";

    public function getFollowing() 
    {   
        $userId = $_SESSION['id'];

        $query = "SELECT followed_id FROM follow WHERE follower_id = $userId";

        $items = $this->pdo->query($query)->fetchAll();
        return $items;
    }

    public function getNotFollowing() 
    {
        $userId = $_SESSION['id'];

        $query = "SELECT id FROM users WHERE id NOT IN (SELECT following_id FROM follows WHERE follower_id = $userId";

        $items = $this->pdo->query($query)->fetchAll();
        return $items;
    }
    
}