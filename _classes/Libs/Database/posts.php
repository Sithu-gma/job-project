<?php
namespace Libs\Database;
use PDOException;

class Posts {
    private $db= null;
    public function __construct (MySQL $db) 
    {
        $this->db=$db->connect();
    }
    public function getPost () 
    {
        $sql="SELECT * FROM posts";
        $stmt=$this->db->query($sql);
        return $stmt->fetchAll();
    }

}