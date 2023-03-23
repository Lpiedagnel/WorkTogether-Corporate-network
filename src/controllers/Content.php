<?php

namespace Controllers;

require_once('src/autoload.php');
require_once('src/models/User.php');

class Content extends Controller 
{
    public function feed()
    {
        $this->checkAuth();

        $allPosts = $this->model->findAll("created_at DESC");
        $userModel = new \Models\User;

        $posts = [];

        foreach($allPosts as $post)
        {
            $author = $userModel->findOne($post['author_id'], 'id');
            $post['authorFirstName'] = $author['first_name'];
            $post['authorLastName'] = $author['last_name'];
            $post['authorAvatar'] = $author['avatar_path'];
            $post['authorJob'] = $author['job'];
            $posts[] = $post;
        }

        $title = "Fil d'actualité - WorkTogether !";
        $description = "Découvrez l'actualité de vos collègues sur WorkTogether.";

        \Renderer::render('messages/feed',compact('title', 'description', 'posts'));
    }

    public function add()
    {
        $this->checkAuth();

        if (isset($_POST) && isset($_POST['text'])) {
            $data = [
                'text' => htmlspecialchars($_POST['text']),
                'author_id' => $_SESSION['id']
                // 'file' => ***********
            ];

            $this->model->insert($data);
            header('location: index.php?controller=message&action=feed');
        }
    }
}