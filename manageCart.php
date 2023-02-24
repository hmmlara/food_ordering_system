<?php
session_start();

include_once "controller/viewCart_controller.php";


    $order = new ViewCartController();

    // Add To Cart
    $user_id =  $_SESSION['user_array']['id'];
    if(isset($_POST['addToCart'])) {

        if(!isset($_SESSION['user_array']))
        {
            header("Location:login.php");
        }
        else{
            $pId = $_POST["pId"];
            $pName = $_POST["pName"];
            $_SESSION['pName'] = $pName;
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


    }

    //Remove Item
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

    //Remove all items
    if(isset($_POST['removeAllItem'])) {
        unset($_SESSION['cart']);
        echo "<script>window.history.back(1);</script>";
        $_SESSION['removeAllItem_msg'] = "All items are Deleted Successfully!";

    }

    //Checkout
    if(isset($_POST['checkout']))
    {
        $user_id = $_SESSION['user_array']['id'];
        $delitype = $_POST['delitype'];
        $paytype = $_POST['paytype'];
        $total_balance = $_POST['amount'];
        $address1 = $_POST["address"];
        $address2 = $_POST["address1"];
        $address = $address1.", ".$address2;
        $phone = $_POST["phone"];

        $order_result = $order-> addOrder($user_id, $delitype, $paytype, $total_balance, $address, $phone);

        if($order_result)
        {
            foreach($_SESSION['cart'] as $key=>$value)
            {
                $product_id = $value['id'];
                // $product_name = $value['name'];
                $product_price = $value['price'];
                $product_qty = $value['qty'];

                $order_details_result = $order->getOrderMaxID($user_id);
                $order_id = $order_details_result['max(id)'];
                $add_order_details = $order->add_order_details($order_id, $product_id, $product_price, $product_qty);
                if($add_order_details)
                {
                    // echo "<script>window.history.back(1);</script>";
                    $_SESSION['order_meg_success'] = "Ordered Successfully!";
                    unset($_SESSION['cart']);
                }
    
    
            }
            header("Location:myorders.php");
        }


    }

        


    

?>