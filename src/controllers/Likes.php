<?php

namespace Controllers;

require_once('src/autoload.php');

class Likes extends Social
{
    protected $modelName = \Models\Likes::class;
    protected $target_id = "post_id";
    protected $trigger_id = "user_id";
}