<?php
    session_start();
    $update_qty=$_POST['qty'];
    $update_id=$_POST['id'];
    var_dump($_SESSION['cart']);
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['id'] == $update_id)
        {
            $_SESSION['cart'][$key]=array('id'=> $update_id, 
                                    'name'=> $value['name'],
                                    'price'=> $value['price'],
                                    'qty'=> $update_qty);

        }
    }




?>