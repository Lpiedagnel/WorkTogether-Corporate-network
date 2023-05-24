<?php

namespace Controllers;

use Upload;

require_once('src/autoload.php');


class User extends Controller {

    protected $modelName = \Models\User::class;

    public function login()
    {
        // Redirect if user is already connected
        if (isset($_SESSION['id'])) {
            header('location: index.php?controller=message&action=feed');
            exit();
        }

        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Store input into variables
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            
            // Check password
            try {

                $user = $this->model->findOne($email, 'email');

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['is_connected'] = true;
                    $_SESSION['is_admin'] = $user['is_admin'];
                    $_SESSION['message'] = "Connexion réussie !";
                    header("location: index.php?controller=message&action=feed");
                    exit();
                } else {
                    throw New \Exception();
                }

            } catch (\Exception $e) {
                $_SESSION['error_message'] = "Connexion échouée. Vérifiez l'adresse mail ou le mot de passe.";
            }
        }

        $title = "WorkTogether - Le réseau social de votre entreprise !";
        $description = "Bienvenue sur WorkTogether, le réseau social de votre entreprise, conçu pour connecter les employés et améliorer la collaboration. Rejoignez notre communauté dès maintenant !";

        \Renderer::render('auth/login',compact('title', 'description'));
    }

    public function logout()
    {
        $this->checkAuth();
        session_destroy();
        session_start();
        $_SESSION['message'] = "Vous avez été déconnecté(e) avec succès. À bientôt !";
        header("location: index.php");
        exit();

    }

    public function signup()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirmation'])) {
            
            try {
                // Test version
                throw New \Exception("Il n'est pas possible de s'inscrire sur la version de test de WorkTogether. Veuillez vous connecter avec le compte de test pour visiter l'application. =)");

                // Store input into variables
                $first_name = htmlspecialchars($_POST['firstName']);
                $last_name = htmlspecialchars($_POST['lastName']);
                $email = htmlspecialchars($_POST['email']);
                $job = $_POST['job'] ? htmlspecialchars($_POST['job']) : null;
                $password = htmlspecialchars($_POST['password']);
                $password_confirmation = htmlspecialchars($_POST['passwordConfirmation']);
        
                // Check password
                if ($password !== $password_confirmation) {
                    throw New \Exception("Les deux mots de passe doivent êtres identiques !");
                }
        
                // Check email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw New \Exception("L'adresse mail doit être valide");
                }
        
                // Password length
                if (strlen($password) <= 4) {
                    throw New \Exception("Le mot de passe doit faire au moins 4 caractères.");
                }
        
                $checkEmail = $this->model->findOne($email, 'email');
    
                if ($checkEmail !== false) {
                    throw New \Exception("L'utilisateur existe déjà.");

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
                    $_SESSION['message'] = "Inscription réussie ! Vous pouvez vous connecter !";
                    header("location: index.php");
                    exit();
                }

            } catch (\Exception $e) {
                $_SESSION['error_message'] = $e->getMessage();
            }
        }

        $title = "WorkTogether - Inscription";
        $description = "S'inscrire à WorkTogether pour communiquer avec vos collègues via le réseau social d'entreprise !";

        \Renderer::render('auth/signup', compact('title', 'description'));
    }

    public function update()
    {   
        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirmation'])) {

            // Store input into variables
            $first_name = htmlspecialchars($_POST['firstName']);
            $last_name = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $job = $_POST['job'] ? htmlspecialchars($_POST['job']) : null;
            $password = htmlspecialchars($_POST['password']);
            $password_confirmation = htmlspecialchars($_POST['passwordConfirmation']);

            try {
            // Test version
            throw New \Exception("Il n'est pas possible de modifier le compte de test !");

                // Check password
                if ($password !== $password_confirmation) {
                    throw new \Exception("Les deux mots de passe doivent êtres identiques.");
                }

                // Check email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new \Exception("L'adresse mail doit être valide");
                }
                
                // Password length
                if (strlen($password) <= 4) {
                    throw new \Exception("Le mot de passe doit faire au moins 4 caractères.");
                }

                // Find user on database
                $checkEmail = $this->model->findOne($email, 'email');

                // Check email
                if ($checkEmail !== false && $checkEmail['email'] !== $_SESSION['email']) {
                    throw new \Exception("Vous n'avez pas l'autorisation de modifier cet utilisateur.");
                }
                
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
                $this->model->update($_SESSION['id'] ,$data);
    
                // Update session
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                $_SESSION['email'] = $data['email'];
    
                // Back to index
                $_SESSION['message'] = "Le compte a bien été modifié !";

            } catch (\Exception $e) {
                $_SESSION['error_message'] = $e->getMessage();
            }
        }

        $this->checkAuth();
        $user = $this->model->findOne($_SESSION['id'], 'id');

        $followModel = new \Models\Follow;

        // Get followers
        $followerUsers = [];

        $follower = $followModel->getFollowers();

        foreach ($follower as $follow) {
            $follow = $this->model->findOne($follow['id'], 'id');

            $follow['isFollowing'] = $followModel->isFollowing($follow['id']);

            $followerUsers[] = $follow;
        }     

        // Get followed
        $followedUsers = [];


        $followed = $followModel->getFollowing();

        foreach ($followed as $follow) {
            $follow = $this->model->findOne($follow['followed_id'], 'id');
            $followedUsers[] = $follow;
        }

        $title = "Modifier son profil - WorkTogether";
        $description = "Modifiez votre profil WorkTogether ici !";

        \Renderer::render('auth/update', compact('title', 'description', 'user', 'followedUsers', 'followerUsers'));
    }

    public function upload()
    {
        $isValid = Upload::checkUpload($_FILES);
        if ($isValid === true) {
            list($target_path) = Upload::upload($this->model);
            $data = ['img_path' => $target_path];
            $this->model->update($_SESSION['id'], $data);
        }

        header('location: index.php?controller=user&action=update');
    }

    public function delete()
    {
        // Check auth
        $this->checkAuth();

        $id = htmlspecialchars($_GET['id']);
        $userId = htmlspecialchars($_SESSION['id']);
        $isAdmin = $this->model->checkAdmin();

        try {
            // Test version
            throw New \Exception("Il n'est pas possible de supprimer un compte sur la version de test de WorkTogether.");

            // Check if user has the right to delete this account.
            if (($userId !== $id) && ($isAdmin !== true)) {
                throw new \Exception("Vous n'avez pas la permission de supprimer ce compte.");
            }

            $followModel = new \Models\Follow;
            $messageModel = new \Models\Message;
            $commentModel = new \Models\Comment;
            
            // Delete follow
            $followModel->delete('follower_id', $id);
            $followModel->delete('followed_id', $id);
            
            // Delete messages
            $messageModel->delete('author_id', $id);
    
            // Delete comments
            $commentModel->delete('author_id', $id);
    
            // Delete user
            $this->model->delete('id', $id);

            // Change redirection if user is admin or not
            if ($isAdmin === true) {
                $_SESSION['message'] = "Compte supprimé avec succès !";
                return header("location: index.php?controller=user&action=admin");
                exit();
            }
    
            // Redirect
            session_destroy();
            session_start();
            $_SESSION['message'] = "Compte supprimé avec succès !";
            header("location: index.php");
            exit();

        } catch (\Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header('location: index.php');
            exit();
        } 
    }

    public function admin()
    {
        $this->checkAuth();

        try {
            // If user not admin
            $isAdmin = $this->model->checkAdmin();
            if ($isAdmin !== true) {
                throw new \Exception("Vous n'avez pas l'autorisation pour accéder à cette page");
            }

            // Get all users
            $usersData = $this->model->findAll();

            $users = [];
            // Select the informations we want (and don't send directly the password)
            foreach ($usersData as $userData) {
                $user['id'] = $userData['id'];
                $user['first_name'] = $userData['first_name'];
                $user['last_name'] = $userData['last_name'];
                $user['img_path'] = $userData['img_path'];

                $users[] = $user;
            }

            $title = "WorkTogether - Panneau d'administration";
            $description = "Panneau réservé uniquement au compte administrateur de WorkTogether";
    
            \Renderer::render('auth/admin', compact('title', 'description', 'users'));

        } catch (\Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header('location: index.php');
            exit();
        }
    }
}