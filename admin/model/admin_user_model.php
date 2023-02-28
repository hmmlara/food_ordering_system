<?php
include_once __DIR__."/../includes/connect.php";

class UserModel{
    private $pdo;
    public function get_admin(){
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
        $sql = "select * from users_info";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function get_default_user(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from users_info where email='userdefault@gmail.com'";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
}
?>