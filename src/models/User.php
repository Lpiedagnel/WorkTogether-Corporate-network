<?php

namespace Models;

include_once('src/models/Model.php');

class User extends Model
{ 
    protected $table = 'users';

    public function checkAdmin() 
    {
        $isAdmin = false;

        if ($_SESSION['is_admin'] === 1) {
            $userId = $_SESSION['id'];
            $user = $this->findOne($userId, 'id');
            $isAdmin = $user['is_admin'] === 1 ? true : false;
        }

        return $isAdmin;
    }

}