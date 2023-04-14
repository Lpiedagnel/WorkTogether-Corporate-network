<?php

namespace Controllers;

require_once('src/autoload.php');

class Follow extends Social
{
    protected $modelName = \Models\Follow::class;
    protected $target_id = "followed_id";
    protected $trigger_id = "follower_id";

    public function getFollowing() {
        $items = $this->model->getFollowing();
        print_r($items);
    }

    public function getNotFollowing() {
        $items = $this->model->getNotFollowing();
        print_r($items);
    }
}