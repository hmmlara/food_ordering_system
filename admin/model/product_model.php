<?php
include_once __DIR__.'/../includes/db.php';
class Products{
    private $pdo;
    public function getProduct(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from products';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;  

    }
}

?>