<?php

include_once 'controller/product_controller.php';

$products_controller=new ProductController();
$id=$_POST['id'];
$result=$products_controller->deleteProduct($id);
if($result){
<<<<<<< HEAD
    echo 'success';
=======
    echo "success";
>>>>>>> 49ed24ae8e07bd11a6176d27720133e57bf4d5a0
}
else{
    echo 'fail';
}
?>