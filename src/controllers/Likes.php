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

            $and = " AND type = 'message' AND user_id = {$data['user_id']}";

            // If already like
            if ($currentLike = $this->model->findOne($data['post_id'], 'post_id', $and)) {
                $this->model->delete('id', $currentLike['id']);
            } else {
            // If not already like
                $this->model->insert($data);
            }
            
            // Echo the update number of ajax
            $likes = $this->model->findAll("", 'post_id ='. $data['post_id']);
            $likesNumber = count($likes);

            echo json_encode($likesNumber);
        }
    }
}