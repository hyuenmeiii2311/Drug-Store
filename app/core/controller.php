<?php
class Controller{
    function view($view,$data = [])
    {
        if (file_exists("./app/views/" . $view . ".php")) {
            include "./app/views/" . $view . ".php";
        }
        else{
            include "./app/views/404.php";
        }
        
    }
    public function load_model($model)
    {
        if (file_exists("./app/models/" . strtolower($model) . ".class.php")) {
            require "./app/models/" . strtolower($model) . ".class.php";
            return $model = new $model();
        }
        return false;

    }
}