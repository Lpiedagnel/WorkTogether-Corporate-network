<?php

namespace Controllers;

use Exception;
use Upload;

require_once('src/autoload.php');
require_once('src/models/User.php');
require_once('src/models/Message.php');

abstract class Content extends Controller 
{
    public function add()
    {
        $this->checkAuth();

        if (isset($_POST) && isset($_POST['text'])) {
            $data = [
                'text' => htmlspecialchars($_POST['text']),
                'author_id' => $_SESSION['id']
            ];

        // If postId, check if message exist on database and get the id for the commentary
        if (isset($_POST['post_id'])) {
            $postId = htmlspecialchars($_POST['post_id']);
            $messageModel = new \Models\Message;
            if ($messageModel->findOne($postId, 'id')) {
                $data['message_id'] = $postId;
            }
        }
        // Check if upload
        if ((!empty($_FILES['img']['name']))) {
            $isValid = Upload::checkUpload();
            if ($isValid) {
                list($target_path) = Upload::upload($this->model);
                $data += ['img_path' => $target_path]; 
            }
        }

        $this->model->insert($data);
        header('location: index.php?controller=message&action=feed');
        }
    }

    public function update()
    {
        try {

            // Check
            if (!isset($_GET['id']) || !isset($_SESSION['id'])) {
                throw new \Exception("L'accès est invalide.");
            }

            $this->checkAuth();

            $contentId = htmlspecialchars($_GET['id']);
            $controller = htmlspecialchars($_GET['controller']);

                    
            if (($post = $this->model->findOne($contentId, 'id'))) {
                
                $title = "Modifier un message - WorkTogether";
                $description = "Vous pouvez modifier votre message ici.";
        
                \Renderer::render('messages/update',compact('title', 'description', 'post', 'controller'));

                // If submit
                if (isset($_POST) && isset($_POST['text']) && $post['author_id'] === $_SESSION['id']) {
                    $data = [
                        'text' => htmlspecialchars($_POST['text']),
                        // file
                    ];

                    $this->model->update($post['id'], $data);
                    header('location: index.php?controller=message&action=feed');
                }

            } else {
                throw new \Exception("Le contenu n'existe pas.");
            }
                    
        } catch (\Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header('location: index.php?controller=message&action=feed');
            exit();
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) && isset($_SESSION['id'])) {
            
            $this->checkAuth();

            $contentId = htmlspecialchars($_GET['id']);
            $authorId = $_SESSION['id'];

            try {
                if ($content = $this->model->findOne($contentId, 'id')) {
                    
                    // Check if user has the right to delete the content
                    if ($authorId === $content['author_id']) {
                        $this->model->delete('id', $contentId);
                        
                        // Delete commentary
                        if ($this->model instanceof \Models\Message) {
                            $commentModel = new \Models\Comment;
                            $commentModel->delete('message_id', $contentId);
                        }
                    }
                    $_SESSION['message'] = "Suppression réussie !";
                }
            } catch (\Exception $e) {
                if ($e instanceof \PDOException) {
                    $_SESSION['error_message'] = "Une erreur est survenue dans la connexion à la base de données. Réessayez plus tard !";
                } else {
                    $_SESSION['error_message'] = "Une erreur est survenue. Réessayez plus tard !";
                }
            } finally {
                header("location: index.php?controller=message&action=feed");
            }
        }
    }
}