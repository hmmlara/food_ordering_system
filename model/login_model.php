<?php
include_once __DIR__."/../admin/includes/connect.php";

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

    public function setUser_SessionId($user_session_id,$user_id)
    {
               //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="UPDATE users_info SET user_session_id = :user_session_id WHERE id = :user_id";

        //prepare sql, change sql string to statement
        $statement=$this->pdo->prepare($sql);

        //bind parameters
        $statement->bindParam(":user_session_id",$user_session_id);
        $statement->bindParam(":user_id",$user_id);

        //excute statement
        $statement->execute();


    }

    public function getUser_SessionId($user_id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="SELECT user_session_id FROM users_info WHERE id=:user_id";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
    //    $statement->bindParam(":id",$id);
       $statement->bindParam(":user_id",$user_id);

       //excute statement
        $statement->execute();
        //result
        $user=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $user;

    }

}



?>
