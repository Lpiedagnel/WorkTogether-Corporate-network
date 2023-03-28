<?php

namespace Controllers;

require_once('src/autoload.php');
require_once('src/controllers/Comment.php');

class Message extends Content 
{
    protected $modelName = \Models\Message::class;

    public function feed()
    {
        $this->checkAuth();

        $allPosts = $this->model->findAll("created_at DESC");
        $userModel = new \Models\User;
        $commentModel = new \Models\Comment;

        $posts = [];

        foreach($allPosts as $post)
        {
            // Get author
            $author = $userModel->findOne($post['author_id'], 'id');
            $post['authorFirstName'] = $author['first_name'];
            $post['authorLastName'] = $author['last_name'];
            $post['authorAvatar'] = $author['img_path'];
            $post['authorJob'] = $author['job'];
            
            // Get comments
            $comments = [];

            $allComments = $commentModel->getComments($post['id']);
            
            foreach($allComments as $comment)
            {
                // Get author of comment
                $author = $userModel->findOne($comment['author_id'], 'id');
                $comment['authorFirstName'] = $author['first_name'];
                $comment['authorLastName'] = $author['last_name'];
                $comment['authorAvatar'] = $author['img_path'];
                $comment['authorJob'] = $author['job'];
                $comments[] = $comment;
            }
            
            $post['comments'] = $comments;

            $posts[] = $post;
        }

        $title = "Fil d'actualité - WorkTogether !";
        $description = "Découvrez l'actualité de vos collègues sur WorkTogether.";

        \Renderer::render('messages/feed',compact('title', 'description', 'posts'));
    }
}