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
        $sql='insert into shipping(township,cost,created_date,updated_date) values(:township,:cost,:created_date,:updated_date)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":township",$township);
        $statement->bindParam(":cost",$cost);
        date_default_timezone_set("Asia/Yangon");
        $date_now=date('Y-m-d H:m:s');
        $statement->bindParam(":created_date",$date_now);
        $statement->bindParam(":updated_date",$date_now);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function deleteShippings($id){
        try{
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="delete from shipping where id=:id";
            $statement=$this->pdo->prepare($sql);
            $statement->bindparam(":id",$id);
            return $statement->execute();
           }
           catch(PDOException $e){
            return false;
           }
    }
}

?>