<?php
include_once __DIR__.'/../model/product_model.php';

class ProductController extends Products{
    public function getProducts(){
        $results=$this->getProduct();
        return $results;
       }

       public function addProducts($type,$name,$price,$description,$size,$filename){
        $results=$this->addProduct($type,$name,$price,$description,$size,$filename);
        return $results;
       }

       public function getParent(){
        $result=$this->getParents();
        return $result;
       }

       public function editProduct($id){
        $result=$this->editProducts($id);
        return $result;
       }

       public function updateProducts($id,$type,$name,$filename,$price,$description,$status){
        $results=$this->updateProduct($id,$type,$name,$filename,$price,$description,$status);
        return $results;
       }

       public function deleteProduct($id){
        $result=$this->deleteProducts($id);
        return $result;
    }
}

?>