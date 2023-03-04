<?php
include_once __DIR__.'/../includes/connect.php';
class Contacts{
    private $pdo;
    public function getContacts(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='SELECT * FROM contacts';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $contacts=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;  

    }

    // public function getContactReply()
    // {
    //     $this->pdo=Database::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $sql='SELECT * FROM contactreply';
    //     $statement=$this->pdo->prepare($sql);
    //     $statement->execute();
    //     $contact=$statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $contact;  
    // }

        
    // public function addContactReply($contact_id, $message, $user_id)
    // {
    //     $this->pdo=Database::connect();
    //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $sql="INSERT INTO `contactreply` (`contact_id`, `user_id`, `message`, `datetime`) 
    //     VALUES (:contactId, :userId, :message, :datetime)";

    //     $statement=$this->pdo->prepare($sql);
    //     $statement->bindParam(':contact_id',$contact_id);
    //     $statement->bindParam(':user_id',$user_id);
    //     $statement->bindParam(':message',$message);

    //     date_default_timezone_set("Asia/Yangon");
    //     $datetime = date("Y-m-d H:i:s");
    //     $statement->bindParam(':datetime',$datetime);

    //     if($statement->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }

    // }


    }


?>