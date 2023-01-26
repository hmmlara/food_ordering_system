<?php
include_once __DIR__.'/../includes/db.php';

class Delivery{
    private $pdo;
    public function getDeliveryInfo(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from deliveries';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $deliveries=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $deliveries;  

    }

    public function getDeliInfo($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select deliveries.*,shipping.cost,shipping.township,shipping.id as ship_id from deliveries join shipping on shipping.id = deliveries.shipping_id where deliveries.id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $categories=$statement->fetch(PDO::FETCH_ASSOC);
        return $categories;


    }

    public function updateDeliInfo($id,$township,$name){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='update deliveries set shipping_id=:township,name=:name where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":township",$township);
        $statement->bindParam(":name",$name);
       return $statement->execute();
    }

    }


?>