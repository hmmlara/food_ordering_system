<?php
session_start();

include_once "controller/viewCart_controller.php";

    $user_id =  $_SESSION['user_array']['id'];
    if(isset($_POST['addToCart'])) {

        if(!isset($_SESSION['user_array']))
        {
            header("Location:login.php");
        }
        else{
            $pId = $_POST["pId"];
            $pName = $_POST["pName"];
            $pQty = $_POST["pQty"];
            $pPrice = $_POST["pPrice"];

            $productCheck = array_column($_SESSION['cart'],'name');
            if(in_array($pName,$productCheck))
            {
                echo "<script>window.history.back(1);</script>";
                $_SESSION['cart_meg_err'] = "You already added this, Please see in cart!";

            }
            else{
                $_SESSION['cart'][]=array('id'=> $pId, 
                                        'name'=> $pName,
                                        'price'=> $pPrice,
                                        'qty'=> $pQty);

                // var_dump($_SESSION['cart']);
                // header("Location:index.php#menu");
                echo "<script>window.history.back(1);</script>";
                $_SESSION['cart_meg_success'] = "Item added to cart!";

    
            }

        }



        // $detailCart = new ViewCartController();
        // $myrow = $detailCart->getDetailCart($product_id); 
        // var_dump($myrow);  
        // Check whether this item exists
        // $existSql = "SELECT * FROM `viewcart` WHERE productid = '$itemId' AND `userId`='$userId'";
        // $result = mysqli_query($conn, $existSql);
        // $numExistRows = mysqli_num_rows($result);
        // if($myrow > 0){
        //     echo "<script>alert('Item Already Added.');
        //             window.history.back(1);
        //             </script>";
        // }
        // else{
        //     $sql = "INSERT INTO `viewcart` (`pizzaId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
        //     $result = mysqli_query($conn, $sql);
        //     if ($result){
        //         echo "<script>
        //             window.history.back(1);
        //             </script>";
        //     }
        // }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['id'] == $itemId)
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['removeItem_msg'] = "Deleted Successfully!";

    
            }
        }
    
        echo "<script>
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        unset($_SESSION['cart']);
        echo "<script>window.history.back(1);</script>";
        $_SESSION['removeAllItem_msg'] = "All items are Deleted Successfully!";

    }
    
    // if(isset($_POST['checkout'])) {
    //     $amount = $_POST["amount"];
    //     $address1 = $_POST["address"];
    //     $address2 = $_POST["address1"];
    //     $phone = $_POST["phone"];
    //     $zipcode = $_POST["zipcode"];
    //     $password = $_POST["password"];
    //     $address = $address1.", ".$address2;
        
    //     $passSql = "SELECT * FROM users WHERE id='$userId'"; 
    //     $passResult = mysqli_query($conn, $passSql);
    //     $passRow=mysqli_fetch_assoc($passResult);
    //     $userName = $passRow['username'];
    //     if (password_verify($password, $passRow['password'])){ 
    //         $sql = "INSERT INTO `orders` (`userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', '0', '0', current_timestamp())";
    //         $result = mysqli_query($conn, $sql);
    //         $orderId = $conn->insert_id;
    //         if ($result){
    //             $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
    //             $addResult = mysqli_query($conn, $addSql);
    //             while($addrow = mysqli_fetch_assoc($addResult)){
    //                 $pizzaId = $addrow['pizzaId'];
    //                 $itemQuantity = $addrow['itemQuantity'];
    //                 $itemSql = "INSERT INTO `orderitems` (`orderId`, `pizzaId`, `itemQuantity`) VALUES ('$orderId', '$pizzaId', '$itemQuantity')";
    //                 $itemResult = mysqli_query($conn, $itemSql);
    //             }
    //             $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
    //             $deleteresult = mysqli_query($conn, $deletesql);
    //             echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
    //                 window.location.href="http://localhost/OnlinePizzaDelivery/index.php";  
    //                 </script>';
    //                 exit();
    //         }
    //     } 
    //     else{
    //         echo '<script>alert("Incorrect Password! Please enter correct Password.");
    //                 window.history.back(1);
    //                 </script>';
    //                 exit();
    //     }    
    // }



            

        





    

?>