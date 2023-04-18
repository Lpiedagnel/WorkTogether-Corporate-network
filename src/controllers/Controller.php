<?php

namespace Controllers;

abstract class Controller
{
    protected $model;
    protected $modelName;
    protected $message;

    public function __construct()
    {
        session_start();
        $this->model = new $this->modelName();
    }

    public function checkAuth()
    {
        if (!$_SESSION['is_connected']) {
            header("Location: index.php");
            die();
        }
    }
}