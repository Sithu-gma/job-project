<?php
namespace Libs\Database;
use PDO;
use PDOException;
class MySQL {
    private $dbhost;
    private $dbuser;
    private $dbname;
    private $dbpass;
    private $db;

    public function __construct (
        $dbhost="localhost",
        $dbname="job",
        $dbuser="root",
        $dbpass="",
    ){
        $this->dbhost=$dbhost;
        $this->dbname=$dbname;
        $this->dbuser=$dbuser;
        $this->dbpass=$dbpass;
        $this->db=null;
    }

    public function connect()
    {
        try{
            $this->db=new PDO("mysql:host=$this->dbhost; dbname=$this->dbname",$this->dbuser,$this->dbpass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
            ]);
            return $this->db;
            // if($this->db) {
            //     echo "Success";
            // }            
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}
// $obj= new MySQL();
// $obj->connect();