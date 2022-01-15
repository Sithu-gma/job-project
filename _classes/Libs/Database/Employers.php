<?php
namespace Libs\Database;
use PDOException;

class Employers{
    private $db=null;
    public $count;
    public function __construct(MySQL $db)
    {
        $this->db=$db->connect();
    }
   
    public function create($data)
    {
       try{
        $sql="INSERT INTO employers (name ,logo ,phone, email, password, address, role_id, post_id, created_at)
        VALUES (:name,:logo, :phone, :email, :password, :address,:role_id , :post_id,  now())";
         $stmt=$this->db->prepare($sql);
         $stmt->execute($data);

         return $this->db->lastInsertId();
       }catch(PDOException $e) {
        return $e->getMessage();
       }
    }
    public function getAll()
    {
        $sql="SELECT * FROM employers ORDER BY id DESC";
        $stmt=$this->db->query($sql);
        return $stmt->fetchAll();
    }
    public function getDetail ($id) {
        $stmt=$this->db->prepare("SELECT * FROM employers WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function update($data)
    {
         try{
            $sql="UPDATE employees SET name=:name ,logo=:logo ,phone=:phone, email=:email, password=:password,
                address=:address, post_id=:post_id,  photo=:photo, modified_at= now() WHERE id=:id";
                    $stmt=$this->db->prepare($sql);
                    $stmt->bindParam(':name',$data['name']);
                    $stmt->bindParam(':logo',$data['logo']);
                    $stmt->bindParam(':phone',$data['phone']);
                    $stmt->bindParam(':email',$data['email']);
                    $stmt->bindParam(':password',$data['password']);
                    $stmt->bindParam(':address',$data['address']);
                    $stmt->bindParam(':post_id',$data['post_id']);
                   
                    $stmt->bindParam(':logo',$data['logo']);
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
