<?php
include_once __DIR__.'/../includes/db.php';

class Shipping{
    private $pdo;
    public function getShippings(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from shipping";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $shippings=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $shippings;
    }
}


?>