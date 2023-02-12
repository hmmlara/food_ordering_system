<?php
include_once __DIR__.'/../includes/connect.php';
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

    public function addProduct($type,$size,$name,$filename,$price,$description){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `products`(`category_id`, `name`, `price`, `description`, `status`, `image`, `created_date`, `updated_date`) VALUES (:cat_id,:name,:price,:description,:status,:image,:created_date,:updated_date)";

        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":cat_id",$type);
        $statement->bindParam(":name",$name);
        $statement->bindparam(":image",$filename);
        $statement->bindParam(":price",$price);
        $statement->bindParam(":description",$description);
        $statement->bindParam(":status",$size);

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

    public function getParents(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from categories where parent=0';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $categories=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function editProducts($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from products where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $products=$statement->fetch(PDO::FETCH_ASSOC);
        return $products;
    }

    public function updateProduct($id,$type,$name,$filename,$price,$description,$status){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='update products set name=:name,image=:image,price=:price,description=:description,status=:status where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
       // $statement->bindParam(":type",$type);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":image",$filename);
        $statement->bindParam(":price",$price);
        $statement->bindParam(":description",$description);
        $statement->bindParam(":status",$status);
       
       return $statement->execute();
    }

    public function deleteProducts($id){
        try{
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql_img = 'select image from products where id=:id';
            $statement_img = $this->pdo->prepare($sql_img);
            $statement_img->bindParam(":id",$id);
            $statement_img->execute();
            $imgfile = $statement_img->fetch(PDO::FETCH_ASSOC)['image'];
            
            $sql="delete from products where id=:id";
            $statement=$this->pdo->prepare($sql);
            $statement->bindparam(":id",$id);
            
            if(file_exists('uploads/'.$imgfile)){
                if($statement->execute()){
                    unlink('uploads/'.$imgfile);
                    return true;
                }
            }

            return false;
           }
           catch(PDOException $e){
            return false;
           }
    }


    public function countProducts(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM products;";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }


    }


?>