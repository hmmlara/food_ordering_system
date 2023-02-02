<?php

include_once 'controller/product_controller.php';

$products_controller=new ProductController();
$id=$_GET['id'];
$result=$products_controller->deleteProduct($id);
if($result){
    echo "success";
}
else{
    echo 'fail';
}
?>