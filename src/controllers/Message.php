<?php

namespace Controllers;

require_once('src/autoload.php');


class Message extends Controller {

    protected $modelName = \Models\Message::class;

    public function feed()
    {
        $this->checkAuth();
        
        $title = "Fil d'actualité - WorkTogether !";
        $description = "Découvrez l'actualité de vos collègues sur WorkTogether.";

        \Renderer::render('messages/feed',compact('title', 'description'));
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