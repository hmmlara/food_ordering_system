<?php
<<<<<<< HEAD
include_once __DIR__."/../../includes/connect.php";
=======
require_once __DIR__."/../includes/connect.php";
>>>>>>> 49ed24ae8e07bd11a6176d27720133e57bf4d5a0


class OrderModel{
    private $pdo;
    public function get_order_info(){
        $this->pdo=DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select orders.*,users_info.name as cus_name
        FROM orders JOIN users_info 
        WHERE users_info.id=orders.user_info_id order by id DESC";
        $statement=$this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function countOrders(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM orders;";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
    public function get_order_details($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select * from order_details where order_id=:id order by id DESC";
        $statement=$this->pdo->prepare($query);
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
    

?>