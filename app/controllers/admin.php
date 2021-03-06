<?php
require MODELS . "articles_model.php";

class Admin {
    function index() {
        $pageContent = "admin_view.php";
        include VIEWS . "layout_view.php";
    }
    
    function getJson(){
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel(); 
        $articles = $articlesModel->getAll();
        echo json_encode($articles);
    }
    
    function getArticle() {
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel();   
        $article = $articlesModel->getArticle($_GET["id"]);
        echo json_encode($article[0]);
    }
    
    function updateArticle() {
        header('Content-Type: application/json');
        
        // Recover PUT method values
        parse_str(file_get_contents("php://input"),$PUT);
        
        $articlesModel = new ArticlesModel();   
        $article = $articlesModel->updateArticle($PUT);
        echo json_encode($article);
    }
    
    function addArticle() {
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel(); 
        $article = $articlesModel->insertArticle($_POST);        
        echo json_encode($article);
    }
    
    function deleteArticle() {
        header('Content-Type: application/json');
        
        // Recover DELETE method values
        parse_str(file_get_contents("php://input"), $DELETE);

        $articlesModel = new ArticlesModel();
        $article = $articlesModel->deleteArticle($DELETE);
        echo json_encode($article);
      }
}