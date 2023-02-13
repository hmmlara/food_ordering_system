<?php
include_once __DIR__."/../include/connect.php";

class Register
{
    private $pdo;
    public function createUser($name,$phone_number,$address,$email,$password)
    {
       //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="INSERT INTO users_info(name,email,phone_number,address,password) VALUES(:name,:email,:phone_number,:address,:password)";

        //prepare sql, change sql string to statement
        $statement=$this->pdo->prepare($sql);

        //bind parameters
        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone_number",$phone_number);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":password",$password);

        //excute statement
        // $statement->execute();

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}



?>