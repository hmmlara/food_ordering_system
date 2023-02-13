<?php
include_once __DIR__."/../include/connect.php";

class Login
{
    private $pdo;
    public function getUser($email,$password)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="SELECT * FROM users_info WHERE email=:email AND password=:password";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
    //    $statement->bindParam(":id",$id);
       $statement->bindParam(":email",$email);
       $statement->bindParam(":password",$password);

       //excute statement
        $statement->execute();
        //result
        $user=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $user;

    }

}



?>
