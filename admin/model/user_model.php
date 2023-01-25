<?php
include_once __DIR__."/../include/db.php";

class UserModel{
    private $pdo;
    public function get_user(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from users";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function get_customers(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select id,name from users_info";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function get_customer_details($id){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from users_info where id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
?>