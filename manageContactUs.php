<?php
session_start();
include_once "layouts/header.php";
include_once "controller/contactreply_controller.php";
include_once "controller/user_controller.php";




if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_array']['id'];;
    
    $email = $_POST["email"];
    $phone_number = $_POST["phone"];
    // $order_id = $_POST["orderId"];
    $message = $_POST["message"];
    $password = md5($_POST["password"]);

    // Check user password is match or not
    $userController = new UserController();
    $user = $userController->getUser($id);

    if ($password == $user['password']){

        $contactreply = new ContactReplyController();
        $result = $contactreply->addContact($user_id,$email,$phone_number,$message);
        // var_dump($result);
        // $contactId = $result->insert_id;
        echo '<script>alert("Thanks for your feedback.");
        window.location.href="http://localhost/fos/index.php";   
                </script>';
        // header('location:index.php');
    }
    else{
        echo "<script>alert('Password incorrect!!');
                window.history.back(1);
                </script>";
    }
    
}
?>