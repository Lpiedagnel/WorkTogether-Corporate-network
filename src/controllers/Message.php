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
}