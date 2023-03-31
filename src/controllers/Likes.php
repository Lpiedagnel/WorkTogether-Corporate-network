<?php

namespace Controllers;

require_once('src/autoload.php');

class Likes extends Controller
{
    protected $modelName = \Models\Likes::class;

    public function add()
    {
        $this->checkAuth();

        if (isset($_GET['type']) && isset($_GET['id'])) {
            
            $data = [
                "type" => htmlspecialchars($_GET['type']),
                "post_id" => htmlspecialchars($_GET['id']),
                "user_id" => $_SESSION['id']
            ];

            $this->model->insert($data);
            header('location: index.php?controller=message&action=feed');

        }
    }
}