<?php

include_once __DIR__."/../admin/includes/connect.php";

class ViewCart
{
    private $pdo;

    public function addOrder($user_id, $delitype, $paytype, $total_balance, $address, $phone)
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `orders`(`user_info_id`, `delivery_id`, `paymentMode`, `total_balance`, `address`, `phone_number`, `status`, `created_date`, `updated_date`) 
        VALUES (:user_info_id, :delivery_id, :paymentMode, :total_balance, :address, :phone_number, :status, :created_date, :updated_date)";

        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':user_info_id',$user_id);
        $statement->bindParam(':delivery_id',$delitype);
        $statement->bindParam(':paymentMode',$paytype);
        $statement->bindParam(':total_balance',$total_balance);
        $statement->bindParam(':address',$address);
        $statement->bindParam(':phone_number',$phone);
        $statement->bindParam(':user_info_id',$user_id);

        $status = "0";
        $statement->bindParam(':status',$status);

        date_default_timezone_set("Asia/Yangon");
        $date_now = date('d-m-y h:i:s');
        $statement->bindParam(':created_date',$date_now);
        $statement->bindParam(':updated_date',$date_now);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getOrderMaxID($user_id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="select max(id) from orders where user_info_id=:id";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
       $statement->bindParam(":id",$user_id);

       //excute statement
        $statement->execute();
        //result
        $orderID=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $orderID;
    }

    public function add_order_details($order_id, $product_id, $product_qty)
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `order_details`(`order_id`, `product_id`, `qty`, `created_date`, `updated_date`) 
        VALUES (:order_id, :product_id, :qty, :created_date, :updated_date)";

        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':order_id',$order_id);
        $statement->bindParam(':product_id',$product_id);
        $statement->bindParam(':qty',$product_qty);

        date_default_timezone_set("Asia/Yangon");
        $date_now = date('d-m-y h:i:s');
        $statement->bindParam(':created_date',$date_now);
        $statement->bindParam(':updated_date',$date_now);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_order($user_info_id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       //write sql string
       $sql="SELECT * FROM `orders` WHERE user_info_id=:user_info_id order by id DESC;";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
       $statement->bindParam(":user_info_id",$user_info_id);

       //excute statement
        $statement->execute();
        //result
        $orderID=$statement->fetchAll(PDO::FETCH_ASSOC);

        //return
        return $orderID;
    }

    public function get_orderDetails($order_id)
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from order_details where order_id=:order_id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":order_id",$order_id);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function get_products()
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from products';
        $statement=$this->pdo->prepare($sql);
        // $statement->bindParam(":id",$productID);
        $statement->execute();
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function get_OrderStatus($order_id)
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from orders where id=:order_id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":order_id",$order_id);
        $statement->execute();
        $results=$statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }


}

?>
