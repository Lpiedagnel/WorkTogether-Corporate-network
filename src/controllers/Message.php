<?php

namespace Controllers;

require_once('src/autoload.php');

class Message extends Content 
{
    protected $modelName = \Models\Message::class;
}