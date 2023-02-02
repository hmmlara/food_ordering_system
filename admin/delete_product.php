<?php

include_once 'controller/product_controller.php';

$products_controller=new ProductController();
$id=$_GET['id'];
$result=$products_controller->deleteProduct($id);
if($result){
    header('location:products.php');
}
else{
    echo 'fail';
}
?>