<?php
#URL Routing
class App
{
    private $controller = "home";
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        //split url
        $url = $this->splitURL();

        //check if url[0] exists
        if (file_exists("./app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = strtolower($url[0]);
            unset($url[0]); 
        }

        //redirect
        require "./app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        //check if url[1] exists
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //run the class and method
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function splitURL()
    {
        // hàm explore chuyển đổi một chuỗi thành một mảng và mỗi phần tử được tách bởi một chuỗi con hay một ký tự nào đó
        // hàm filter_var lọc các biến - ngăn chặn hacker?
        $url = isset($_GET['url'])? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}
