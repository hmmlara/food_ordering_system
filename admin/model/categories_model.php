<?php
include_once __DIR__.'/../includes/db.php';

class Categories{
    private $pdo;
    public function getCategory(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from categories';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $categories=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $categories;  

    }

    public function getParents(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from categories where parent=0';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $parents=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $parents;

    }

    public function addCat($name,$parent){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='insert into categories(name,parent,created_date,updated_date) values(:name,:parent,:created_date,:updated_date)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":parent",$parent);

        date_default_timezone_set("Asia/Yangon");
        $date_now=date('Y-m-d H:i:s');
        $statement->bindParam(":created_date",$date_now);
        $statement->bindParam(":updated_date",$date_now);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getCatInfo($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from categories where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $categories=$statement->fetch(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function updateCat($id,$name,$parent){
        $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql='update categories set name=:name,parent=:parent where id=:id';
            $statement=$this->pdo->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":parent",$parent);
           return $statement->execute();
    
       }

       public function deleteCat($id){
        try{
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql='delete from categories where id=:id';
            $statement=$this->pdo->prepare($sql);
            $statement->bindParam(':id',$id);
        
            $sql1='select * from categories where parent=:id';
            $statement1=$this->pdo->prepare($sql1);
            $statement1->bindParam(':id',$id);   
            $statement1->execute();
            $children=$statement1->fetchAll(PDO::FETCH_ASSOC);
            if(count($children)>0){
                return false;
                
          }
            else{
                return $statement->execute();
        
            }
           }
           catch(PDOException $e){
            return false;
           }
            
        
           }


        //    public function getCategoriesPages($page){
        //     $item_page=5;
        //         $offset=($page-1) * $item_page;
        //         $this->cont=Database::connect();
        //         $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        //         $sql="select*from categories limit $offset, $item_page ";
        //         $statement=$this->cont->prepare($sql);
        //         $statement->execute();
               
        //         $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        //         return $result;
        
        //     }
       }


?>