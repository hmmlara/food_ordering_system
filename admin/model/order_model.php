<?php
require_once __DIR__."/../includes/connect.php";


class OrderModel{
    private $pdo;
    public function get_order_info(){
        $this->pdo=DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select orders.*,users_info.name as cus_name,users_info.email 
        FROM orders JOIN users_info 
        WHERE users_info.id=orders.user_info_id order by id DESC";
        $statement=$this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function get_specific_order($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select * from orders 
        where orders.id=:id";
        $statement=$this->pdo->prepare($query);
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function get_deli_type(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select * from deliveries";
        $statement=$this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_order_details($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="SELECT order_details.*,products.name,products.price as product_price,(SELECT users_info.name FROM
        users_info JOIN orders ON orders.user_info_id = users_info.id WHERE orders.id = :id) as cus_name
        FROM order_details
        JOIN products ON products.id = order_details.product_id 
        WHERE order_details.order_id = :id";
        $statement=$this->pdo->prepare($query);
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_order_status($status,$order_id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query= "UPDATE `orders` set `status`=:status WHERE `id`=:id";
        $statement=$this->pdo->prepare($query);
        $statement->bindParam(":status",$status);
        $statement->bindParam(":id",$order_id);
        $statement->execute();
    }
}
    

?>