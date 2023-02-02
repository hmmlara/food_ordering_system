<?php

include_once 'controller/shipping_controller.php';

$ship_controller=new ShippingController();
$shipping=$ship_controller->getShipping();
$id=$_GET['id'];
$result=$ship_controller->deleteShipping($id);
if($result){
    header('location:shipping.php');
}
else{
    $_SESSION['message']='It cannot be deleted';
    header('location:shipping.php');
}
?>