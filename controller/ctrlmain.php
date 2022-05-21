<?php

class controllerMain
{
    public function route()
    {
        if (isset($_SESSION['username'])) {
            if (isset($_GET['controller']))
                $controller = $_GET['controller'];
            else
                $controller = 'ctrlhome'; // default

            if (isset($_GET['action']))
                $action = $_GET['action'];
            else
                $action = 'view';  // default

            require_once 'controller/' . $controller . '.php';
            $controller = new $controller();
            $controller->$action();

        }else{
            require_once 'view/login.php';
        }
    }
}
