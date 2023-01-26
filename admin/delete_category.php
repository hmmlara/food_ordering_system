<?php

include_once 'controller/categories_controller.php';

$categoriesController=new CategoriesController();
$id=$_POST['id'];
$result=$categoriesController->deleteCategory($id);
if($result){
    echo "success";
}
else{
    echo 'fail';
}
?>