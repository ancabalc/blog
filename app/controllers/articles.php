<?php
require MODELS . "articles_model.php";

class Articles {
    
    function index() {
        
        $articlesModel = new ArticlesModel();
        $articles = $articlesModel->getAll();
        
        require MODELS .  "comments_model.php";
        $commentsModel = new CommentsModel();
        $comments = $commentsModel->getAll();
        
        $pageContent = VIEWS . "articles_view.php";
        
        include VIEWS . "layout_view.php";
        //include "app/views/comments_view.php";
    }
    
    function getHtml() {
        $articlesModel = new ArticlesModel();
        $articles = $articlesModel->getAll();
        
        $list = "<table>";
        for($i=0; $i<count($articles); $i++) {
            $list .= "<tr><td>".$articles[$i]["title"]."</td><td>".$articles[$i]["body"]."</td></tr>";       
        }
        $list .= "</table>";
        
        echo $list;
    }
    
    function getJson() {
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel();
        $articles = $articlesModel->getAll();
        
        echo json_encode($articles);
    }
    
    function add() {
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel();
        $id = $articlesModel->addArticle($_POST);
        
        echo json_encode(array("id"=> $id));
    }
    
    function update() {
        header('Content-Type: application/json');
        
        $articlesModel = new ArticlesModel();  
        $id = $articlesModel->updateArticle($_POST);
        
        echo json_encode(array("id"=> $id));
    }
    
}