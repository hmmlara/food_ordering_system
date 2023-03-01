<?php   
include_once __DIR__.'/../includes/connect.php';

class Report{
    private $pdo;
    public function getSale(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select product_id, sum(qty) as total_qty
        from order_details join products
        where order_details.product_id=products.id
        GROUP BY product_id';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $qty=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $qty;  

    }

    public function getItems(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select products.name,categories.id as category_id,products.price,order_details.created_date, SUM(qty) AS total_qty,
        sum(products.price * order_details.qty) as total_price
        from order_details join products
        on products.id=order_details.product_id
        join categories on categories.id = products.category_id
        group by products.name, created_date';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $item=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $item; 

    }

    public function getTotalItems(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select order_details.created_date,sum(qty) as total_qty
        from products join order_details
        where products.id=order_details.product_id
        group by order_details.created_date';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $product=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $product; 

    }

    public function getOrderDate(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='SELECT products.name,order_details. created_date, SUM(qty) AS total_qty,
        products.price,order_details.qty,monthname(max(order_details.created_date)) as month,categories.id
        FROM order_details join products join categories
        where products.id=order_details.product_id
        and categories.id=products.category_id
        GROUP BY products.name, created_date, month(order_details.created_date);
        ';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $daily=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $daily; 

    }

    public function getPages($page){
            $limit=5;
            $offset=($page - 1) * $limit;
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $sql="SELECT products.name,order_details. created_date,monthname(max(order_details.created_date)) as month, SUM(qty) AS total_qty,
            products.price,order_details.qty,categories.id
            FROM order_details join products join categories
            where products.id=order_details.product_id
            and categories.id=products.category_id
            GROUP BY month(order_details.created_date), products.name, created_date limit $offset,$limit";
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
           
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getMonth(){
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $sql="select monthname(max(created_date)) as month,
            year (created_date) as year,
            COALESCE(count(*),0) as count 
            from order_details
            group by year(created_date),month(created_date)
            order by year(created_date),month(created_date)";
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
           
            $month_result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $month_result;

        }

        public function getAllResults(){
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $sql="select monthname(max(order_details.created_date)) as month,categories.id,products.name,
            products.price * order_details.qty as total_price ,order_details.created_date,order_details.qty
                        from order_details join categories join products
                        on categories.id=products.category_id
                        and products.id=order_details.product_id
                        group by month(order_details.created_date)
                       ";
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
           
            $all_result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $all_result;

        }
    }

  





?>