<?php
include_once __DIR__."/../../includes/connect.php";


class OrderModel{
    private $pdo;
    public function get_order_info(){
        $this->pdo=DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select orders.*,users_info.name as cus_name
        FROM orders JOIN users_info
        WHERE users_info.id=orders.user_info_id";
        $statement=$this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
    
}
    

?>