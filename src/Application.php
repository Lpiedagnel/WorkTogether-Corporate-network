<?php

class Application {
    public static function process()
    {
        $controllerName = "User";
        $action = "login";

        if (!empty($_GET['controller'])) {
            $controllerName = htmlspecialchars(ucfirst($_GET['controller']));
        }

        if (!empty($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
        }

        $controllerName = "\Controllers\\" . $controllerName;

        if (class_exists($controllerName) && method_exists($controllerName, $action)) {
            $controller = new $controllerName();
            $controller->$action();
        } else {
            $_SESSION['error_message'] = "Cette page n'existe pas.";
            http_response_code(404);
            header('location: index.php');
        }

    }
}