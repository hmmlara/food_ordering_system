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
}
?>