<?php
<<<<<<< HEAD
include_once __DIR__."/../includes/connect.php";
=======
include_once __DIR__."/../include/connect.php";
>>>>>>> 49ed24ae8e07bd11a6176d27720133e57bf4d5a0

class User
{
    private $pdo;
    public function getUsers()
    {


       //DB connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql string
        $sql="select * from users_info";

        //prepare sql, change sql string to statement
        $statement=$this->pdo->prepare($sql);

        //excute statement
        $statement->execute();

        //result
        $users=$statement->fetchAll(PDO::FETCH_ASSOC);

        //return
        return $users;
    }

    public function getUser($id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="select * from users_info where id=:id";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
       $statement->bindParam(":id",$id);

       //excute statement
        $statement->execute();
        //result
        $user=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $user;

    }

        
    public function updateUser($id, $name, $email, $phone_number, $address, $new_password)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="UPDATE users_info SET name=:name,email=:email,phone_number=:phone_number,address=:address,password=:new_password WHERE id=:id";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
       $statement->bindParam(":id",$id);
       $statement->bindParam(":name",$name);
       $statement->bindParam(":email",$email);
       $statement->bindParam(":phone_number",$phone_number);
       $statement->bindParam(":address",$address);
       $statement->bindParam(":new_password",$new_password);

       //excute statement
        return $statement->execute();


    }

}



?>
