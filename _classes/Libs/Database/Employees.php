<?php
namespace Libs\Database;
use PDOException;

class Employees {
    private $db=null;
    public function __construct(MySQL $db) 
    {
        $this->db= $db->connect();
    }
    public function create($data)
    {
        try{
            $sql="INSERT INTO employees (name ,nrc ,phone, email, password, age, address, post_id, role_id, photo, created_at)
            VALUES (:name, :nrc, :phone, :email, :password, :age, :address,:post,:role ,:photo , now())";
             $stmt=$this->db->prepare($sql);
             $stmt->execute($data);
    
             return $this->db->lastInsertId();
           }catch(PDOException $e) {
            return $e->getMessage();
           }
    }

    public function getAll()
    {
        $sql="SELECT employees.*, posts.post_name FROM employees 
                LEFT JOIN posts ON employees.post_id=posts.id
                ORDER BY id DESC";
        $stmt=$this->db->query($sql);
        return $stmt->fetchAll();
        
    }
    public function getDetail($id)
    {
        $sql="SELECT * FROM employees WHERE id=:id";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function getCount()
    {
        $sql="SELECT * From employees";
        $stmt=$this->db->query($sql);
       
        return $stmt->rowCount();
        
    }
    public function update($data)
    {
         try{
            $sql="UPDATE employees SET name=:name ,nrc=:nrc ,phone=:phone, email=:email, password=:password, age=:age,
                address=:address, post_id=:post_id,  photo=:photo, modified_at= now() WHERE id=:id";
                    $stmt=$this->db->prepare($sql);
                    $stmt->bindParam(':name',$data['name']);
                    $stmt->bindParam(':nrc',$data['nrc']);
                    $stmt->bindParam(':phone',$data['phone']);
                    $stmt->bindParam(':email',$data['email']);
                    $stmt->bindParam(':password',$data['password']);
                    $stmt->bindParam(':age',$data['age']);
                    $stmt->bindParam(':address',$data['address']);
                    $stmt->bindParam(':post_id',$data['post_id']);
                   
                    $stmt->bindParam(':photo',$data['photo']);
                    $stmt->bindParam(':id',$data['id']);
                    $stmt->execute();
                    return $stmt->rowCount();
           
           }catch(PDOException $e) {
            return $e->getMessage();
           }

    }
    public function delete($id)
    {
            $statement = $this->db->prepare("
            DELETE FROM employees WHERE id = :id
            ");
            $statement->execute([ ':id' => $id ]);
            return $statement->rowCount();
            
    }


}