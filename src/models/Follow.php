<?php

namespace Models;

include_once('src/models/Model.php');

class Follow extends Model
{
    protected $table = "follow";

    public function getFollowing() 
    {   
        $userId = $_SESSION['id'];
    
        $query = "SELECT followed_id FROM follow WHERE follower_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':user_id', $userId, $this->pdo::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll();
        return $items;
    }

    public function getNotFollowing(int $limit = null) 
    {
        $userId = $_SESSION['id'];

        $query = "SELECT id FROM users WHERE id NOT IN (SELECT followed_id FROM follow WHERE follower_id = :user_id)";
    
        if ($limit > 0) {
            $query .= " ORDER BY RAND() LIMIT :limit";
        }
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':user_id', $userId, $this->pdo::PARAM_INT);
        if ($limit > 0) {
            $stmt->bindValue(':limit', $limit, $this->pdo::PARAM_INT);
        }
        $stmt->execute();
        $items = $stmt->fetchAll();
        return $items;
    }
    
}