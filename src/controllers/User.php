<?php

namespace Controllers;

require_once('src/autoload.php');


class User extends Controller {

    protected $modelName = \Models\User::class;

    public function loginForm()
    {
        $title = "WorkTogether - Le réseau social de votre entreprise !";
        $description = "Bienvenue sur WorkTogether, le réseau social de votre entreprise, conçu pour connecter les employés et améliorer la collaboration. Rejoignez notre communauté dès maintenant !";

        \Renderer::render('auth/login',compact('title', 'description'));
    }

    public function signupForm()
    {
        $title = "WorkTogether - Inscription";
        $description = "S'inscrire à WorkTogether pour communiquer avec vos collègues via le réseau social d'entreprise !";

        \Renderer::render('auth/signup', compact('title', 'description'));
    }


}