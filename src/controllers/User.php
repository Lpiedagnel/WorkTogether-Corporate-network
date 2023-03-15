<?php

namespace Controllers;

require_once('src/autoload.php');


class User extends Controller {

    protected $modelName = \Models\User::class;

    public function loginForm()
    {
        $title = 'S\'inscrire';
        $description = 'S\'inscrire à la To-do-List pour voir et ajouter des tâches !';

        \Renderer::render('user/login',compact('title', 'description'));
    }
}