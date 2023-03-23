<?php

namespace Controllers;

require_once('src/autoload.php');

class Comment extends Content
{
    protected $modelName = \Models\Comment::class;
}