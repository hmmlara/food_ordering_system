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

    public function editShippings($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from shipping where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $shipping=$statement->fetch(PDO::FETCH_ASSOC);
        return $shipping;

    }

    public function updateShippings($id,$township,$cost){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='update shipping set township=:township,cost=:cost where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":township",$township);
        $statement->bindParam(":cost",$cost);
       return $statement->execute();
    }

    public function addShippings($township,$cost){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='insert into shipping(township,cost) values(:township,:cost)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":township",$township);
        $statement->bindParam(":cost",$cost);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}

?>