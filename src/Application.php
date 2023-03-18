<?php

class Application {
    public static function process()
    {
        $controllerName = "User";
        $action = "login";

        if (!empty($_GET['controller'])) {
            $controllerName = ucfirst($_GET['controller']);
        }

        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$action();
    }
}