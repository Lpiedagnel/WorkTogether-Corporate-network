<?php

namespace Controllers;

require_once('src/autoload.php');
require_once('src/models/User.php');


class Message extends Content 
{
    protected $modelName = \Models\Message::class;
}