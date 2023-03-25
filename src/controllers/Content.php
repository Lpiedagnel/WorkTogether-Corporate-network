<?php

namespace Controllers;

require_once('src/autoload.php');
require_once('src/models/User.php');
require_once('src/models/Message.php');

class Content extends Controller 
{
    public function add()
    {
        $this->checkAuth();

        if (isset($_POST) && isset($_POST['text'])) {
            $data = [
                'text' => htmlspecialchars($_POST['text']),
                'author_id' => $_SESSION['id'],
                // 'file' => ***********
            ];

        // If postId, check if post exist on database
        if (isset($_POST['post_id'])) {
            $postId = htmlspecialchars($_POST['post_id']);
            $messageModel = new \Models\Message;
            if ($messageModel->findOne($postId, 'id')) {
                $data['message_id'] = $postId;
            }
        }
            $this->model->insert($data);
            header('location: index.php?controller=message&action=feed');
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) && isset($_SESSION['id'])) {
            
            $this->checkAuth();

            $contentId = htmlspecialchars($_GET['id']);
            $authorId = $_SESSION['id'];

            if ($content = $this->model->findOne($contentId, 'id')) {

                // Check if user has the right to delete the content
                if ($authorId === $content['author_id']) {
                    $this->model->delete($contentId);
                }
            }

        }
        
    header("location: index.php?controller=message&action=feed");

    }
}