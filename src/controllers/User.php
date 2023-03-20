<?php

namespace Controllers;

require_once('src/autoload.php');


class User extends Controller {

    protected $modelName = \Models\User::class;

    public function login()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Store input into variables
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            
            // Check password
            if ($this->message['text'] === null) {
                
                $user = $this->model->findOne($email, 'email');
            
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['is_connected'] = true;
                    $this->message['text'] = "Connexion réussie !";
                    $this->message['success'] = true;
                    header("location: index.php?controller=message&action=feed");
                    exit();
                } else {
                    $this->message['text'] = 'L\'utilisateur n\'a pas été trouvé. Vérifiez le mot de passe ou l\'adresse mail.';
                    $this->message['success'] = false;
                }
            }
        }

        $title = "WorkTogether - Le réseau social de votre entreprise !";
        $description = "Bienvenue sur WorkTogether, le réseau social de votre entreprise, conçu pour connecter les employés et améliorer la collaboration. Rejoignez notre communauté dès maintenant !";
        $message['text'] = $this->message['text'] === null ? '' : $this->message['text'];
        $message['success'] = $this->message['success'] === true ? true : false;

        \Renderer::render('auth/login',compact('title', 'description', 'message'));
    }

    public function logout()
    {
        $this->checkAuth();
        session_destroy();
        header("location: index.php");

    }

    public function signup()
    {
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
                $this->message['text'] = 'Les mots de passe doivent êtres identiques !';
                $this->message['success'] = false;
            }
    
            // Check email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->message['text'] = 'Vous devez rentrer un email valide';
                $this->message['success'] = false;
            }
    
            // Password length
            if (strlen($password) <= 4) {
                $this->message['text'] = "Vous devez choisir un mot de passe d'au moins 4 caractères !";
                $this->message['success'] = false;
            }
    
            if (!isset($message)) {
                $checkEmail = $this->model->findOne($email, 'email');
    
                if ($checkEmail !== false) {
                    $this->message['text'] = "L'utilisateur existe déjà.";
                    $this->message['success'] = false;
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
                    $this->message['text'] = "Enregistrement du compte réussi !";
                    $this->message['success'] = true;
                }
            }
        }

        $title = "WorkTogether - Inscription";
        $description = "S'inscrire à WorkTogether pour communiquer avec vos collègues via le réseau social d'entreprise !";
        $message['text'] = $this->message['text'] === null ? '' : $this->message['text'];
        $message['success'] = $this->message['success'] === true ? true : false;

        \Renderer::render('auth/signup', compact('title', 'description', 'message'));
    }
}