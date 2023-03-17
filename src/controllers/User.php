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

    public function signup()
    {
        $message = null;

        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirmation'])) {
            
            // Store input into variables
            $first_name = htmlspecialchars($_POST['firstName']);
            $last_name = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $job = $_POST['job'] ? htmlspecialchars($_POST['job']) : null;
            $password = htmlspecialchars($_POST['password']);
            $password_confirmation = htmlspecialchars($_POST['passwordConfirmation']);
    
            // Check password
            if ($password !== $password_confirmation) {
                $message = 'Les mots de passe doivent êtres identiques !';
            }
    
            // Check email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = 'Vous devez rentrer un email valide';
            }
    
            // Password length
            if (strlen($password) <= 4) {
                $message = "Vous devez choisir un mot de passe d'au moins 4 caractères !";
            }
    
            if (!isset($message)) {
                $checkEmail = $this->model->findOne($email, 'email');
    
                if ($checkEmail !== false) {
                    $message = "L'utilisateur existe déjà.";
                } else {
                    // Hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                    // Get data
                    $data = [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'job' => $job,
                        'password' => $password_hash,
                    ];
                    // Store to database
                    $this->model->insert($data);
    
                    // Back to index
                    $message = "Enregistrement du compte réussi !";
                }
            }
        }

        $title = "WorkTogether - Inscription";
        $description = "S'inscrire à WorkTogether pour communiquer avec vos collègues via le réseau social d'entreprise !";
        $message = isset($message) ? $message : '';

        \Renderer::render('auth/signup', compact('title', 'description', 'message'));
    }
}