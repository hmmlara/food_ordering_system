<?php

include_once 'controller/shipping_controller.php';

$shippingController=new ShippingController();
$id=$_POST['id'];
$result=$shippingController->deleteShipping($id);
if($result){
    echo "success";
}
else{
    echo 'fail';
}
?>