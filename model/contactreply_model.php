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
       $sql="SELECT * FROM `contactreply` WHERE `user_id`=:user_id";

       //prepare sql, change sql string to statement
       $statement=$this->pdo->prepare($sql);
    //    $statement->bindParam(":id",$id);
       $statement->bindParam(":user_id",$user_id);

       //excute statement
        $statement->execute();
        //result
        $reply=$statement->fetchAll(PDO::FETCH_ASSOC);

        //return
        return $reply;

    }

    public function addContact($user_id,$email,$phone_number,$message)
    {
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO `contacts` (`user_id`, `email`, `phone_number`, `message`, `time`) 
        VALUES (:user_id, :email, :phone_number, :message, :time)";

        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':user_id',$user_id);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone_number',$phone_number);
        $statement->bindParam(':message',$message);

        date_default_timezone_set("Asia/Yangon");
        $date_now = date("Y-m-d H:i:s");
        $statement->bindParam(':time',$date_now);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}



?>
