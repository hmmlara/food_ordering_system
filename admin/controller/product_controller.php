<?php
include_once __DIR__.'/../model/product_model.php';

class ProductController extends Products{
    public function getProducts(){
        $results=$this->getProduct();
        return $results;
       }

       public function addProducts($type,$size,$name,$filename,$price,$description){
        $results=$this->addProduct($type,$size,$name,$filename,$price,$description);
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
        $result=$this->deletProducts($id);
        return $result;
        }

        public function countProducts(){
        $results=parent::countProducts();
        return $results;
        }   
}

?>