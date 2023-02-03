<?php

include_once 'controller/product_controller.php';

$products_controller=new ProductController();
$id=$_POST['id'];
$result=$products_controller->deleteProduct($id);
if($result){
    echo "success";
}
else{
    echo 'fail';
}
?>