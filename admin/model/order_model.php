<?php
require_once __DIR__."/../includes/connect.php";


class OrderModel{
    private $pdo;
    public function get_acc_order_info(){
        $this->pdo=DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select orders.*,users_info.name as cus_name,users_info.email 
        FROM orders JOIN users_info 
        WHERE users_info.id=orders.user_info_id AND users_info.email!='userdefault@gmail.com' order by id DESC";
        $statement=$this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function get_phone_order_info(){
        $this->pdo=DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="select orders.*,users_info.name as cus_name,users_info.email 
        FROM orders JOIN users_info 
        WHERE users_info.id=orders.user_info_id AND users_info.email ='userdefault@gmail.com' order by id DESC";
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
    // public function order_phone_filter(){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_acc_filter(){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email!='userdefault@gmail.com' order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_type_filter($ordertype){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.delivery_id=:ordertype order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_method_phone_filter($ordertype){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=:ordertype order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_method_acc_filter($ordertype){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email!='userdefault@gmail.com' AND orders.delivery_id=:ordertype order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_status_filter($orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function phone_deli_status($ordertype,$orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=:ordertype order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function acc_deli_status($ordertype,$orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus AND users_info.email!='userdefault@gmail.com' AND orders.delivery_id=:ordertype order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_phone_date($start_date,$end_date){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.created_date>:start_date AND orders.created_date<:end_date order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_acc_date($start_date,$end_date){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email!='userdefault@gmail.com' AND orders.created_date>:start_date AND orders.created_date<:end_date order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_type_date($start_date,$end_date,$ordertype){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.delivery_id=:ordertype AND orders.created_date>:start_date AND orders.created_date<:end_date order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_status_date($start_date,$end_date,$orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus  AND orders.created_date>:start_date AND orders.created_date<:end_date  order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function phone_deli_status_date($start_date,$end_date,$ordertype,$orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=:ordertype AND orders.created_date>:start_date AND orders.created_date<:end_date order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function acc_deli_status_date($start_date,$end_date,$ordertype,$orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND orders.status=:orderstatus AND users_info.email!='userdefault@gmail.com' AND orders.delivery_id=:ordertype AND orders.created_date>:start_date AND orders.created_date<:end_date order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":ordertype",$ordertype);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->bindParam(":start_date",$start_date);
    //     $statement->bindParam(":end_date",$end_date);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_status_phone_filter($orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND  users_info.email='userdefault@gmail.com' AND orders.status=:orderstatus order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function order_status_acc_filter($orderStatus){
    //     $this->pdo=DataBase::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $query="select orders.*,users_info.name as cus_name,users_info.email 
    //     FROM orders JOIN users_info 
    //     WHERE users_info.id=orders.user_info_id AND users_info.email!='userdefault@gmail.com'  AND orders.status=:orderstatus  order by id DESC";
    //     $statement=$this->pdo->prepare($query);
    //     $statement->bindParam(":orderstatus",$orderStatus);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function phone_order_filter($ordertype,$orderStatus,$start_date,$end_date){
        // var_dump($start_date);
        // var_dump($end_date);
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($start_date!='' && $end_date!=''){
            if($ordertype!=0 && $orderStatus!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=$ordertype AND orders.status=$orderStatus  AND orders.created_date>$start_date AND orders.created_date<$end_date order by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            else if($ordertype!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=$ordertype AND orders.created_date>$start_date AND orders.created_date<$end_date order by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            else if($orderStatus!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.status=$orderStatus order AND orders.created_date>$start_date AND orders.created_date<$end_date by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        else{
            if($ordertype!=0 && $orderStatus!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=$ordertype AND orders.status=$orderStatus order by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            else if($ordertype!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.delivery_id=$ordertype  order by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            else if($orderStatus!=0){
                $query="select orders.*,users_info.name as cus_name,users_info.email 
                FROM orders JOIN users_info 
                WHERE users_info.id=orders.user_info_id AND users_info.email='userdefault@gmail.com' AND orders.status=$orderStatus order by id DESC";
                $statement=$this->pdo->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
}
    

?>