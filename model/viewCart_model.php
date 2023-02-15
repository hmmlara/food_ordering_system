<?php
include_once __DIR__."/../admin/includes/connect.php";

class ViewCart
{
    private $pdo;
    public function getViewCart($user_id)
    {


       //DB connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql string
        $sql="select * from view_cart where user_id = :user_id";

        //prepare sql, change sql string to statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":user_id",$user_id);
        //excute statement
        $statement->execute();

        //result
        $carts=$statement->fetchAll(PDO::FETCH_ASSOC);

        //return
        return $carts;
    }
    
    public function getDetailCart($user_id,$product_id)
    {


       //DB connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql string
        $sql="SELECT itemQuantity FROM view_cart
        WHERE view_cart.product_id=:product_id AND user_id=:user_id";

        //prepare sql, change sql string to statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":user_id",$user_id);
        $statement->bindParam(":product_id",$product_id);
        //excute statement
        $statement->execute();

        //result
        $carts=$statement->fetchAll(PDO::FETCH_ASSOC);

        //return
        return $carts;
    }

    public function addToCart($product_id,$user_id,$qty){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `view_cart`( `product_id`, `user_id`, `qty`) 
        VALUES (:product_id, :user_id, :qty)";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":cat_id",$type);
        $statement->bindParam(":name",$name);   
        $statement->bindparam(":image",$filename);

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
}
// INSERT INTO `view_cart` (`id`, `category_id`, `product_id`, `user_id`, `qty`) VALUES (NULL, '11', '19', '5', '1');



// SELECT products.name, products.price FROM view_cart
//         INNER JOIN categories
//         ON view_cart.category_id = category_id
//         INNER JOIN products
//         ON view_cart.product_id = product_id;


?>
