<?php
include_once __DIR__."/../admin/includes/connect.php";

class ContactReply
{
    private $pdo;

    public function getContact($user_id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="SELECT * FROM `contact` WHERE `user_id`='$user_id'";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
    //    $statement->bindParam(":id",$id);
       $statement->bindParam(":user_id",$user_id);

       //excute statement
        $statement->execute();
        //result
        $contact=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $contact;

    }

    public function getContactReply($user_id)
    {
        //DB connection
       $this->pdo=Database::connect();
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //write sql string
       $sql="SELECT * FROM `contactreply` WHERE `user_id`='$user_id'";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
    //    $statement->bindParam(":id",$id);
       $statement->bindParam(":user_id",$user_id);

       //excute statement
        $statement->execute();
        //result
        $reply=$statement->fetch(PDO::FETCH_ASSOC);

        //return
        return $reply;

    }

}



?>
