<?php
require_once "db_model.php";

class CommentsModel extends DB {
    function getAll() {
        $statement = $this->executeQuery("SELECT * FROM comments");    
        return $statement->fetchAll(PDO::FETCH_ASSOC);    
    }   

    function addComment($comment) {
        $this->executeQuery("INSERT into comments (article_id,email, body) values ('".$comment["article_id"]."', '".$comment["email"]."', '".$comment["body"]."');");
        return $this->db->lastInsertId();    
    }
}