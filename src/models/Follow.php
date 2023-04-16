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

    public function getFollowers()
    {
        $userId = $_SESSION['id'];
    
        $query = "SELECT users.* FROM users JOIN follow ON users.id = follow.follower_id  WHERE follow.followed_id = :user_id";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':user_id', $userId, $this->pdo::PARAM_INT);
        $stmt->execute();
        $followers = $stmt->fetchAll($this->pdo::FETCH_ASSOC);
        return $followers;
    }

    public function isFollowing($followedId)
    {
        $followerId = $_SESSION['id'];

        $query = "SELECT COUNT(*) FROM follow WHERE follower_id = :follower_id AND followed_id = :followed_id";
                
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':follower_id', $followerId, $this->pdo::PARAM_INT);
        $stmt->bindValue(':followed_id', $followedId, $this->pdo::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    
}