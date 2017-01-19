<?php
class Controller {
    function __construct() {
        // all pages from my blog
        $pages = array (
            "articles" => array("path" => "articles.php", "class" => "Articles"),
            "admin" => array("path" => "admin.php", "class" => "Admin")
        );
        
        // blog/articles/add
        $uri = $_SERVER["PATH_INFO"];
        $segments = explode("/", $uri);

        $page = "articles";
        
        $controller = $segments[1];
        $method = empty($segments[2]) ? "" : $segments[2] ;
        
        if(!empty($controller)) {
            if (array_key_exists($controller, $pages))              {
                $page = $controller;
            }
            else {
                http_response_code(404);
                echo "NOT FOUND";
                exit;
            }
        }
         
        require $pages[$page]["path"];
        $controllerClass = new $pages[$page]["class"]();
        if (!empty($method) && method_exists($page, $method)) {
            $controllerClass->$method();
        }
        else {
            $controllerClass->index();    
        }
        
    }
}