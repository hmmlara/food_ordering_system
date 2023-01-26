<?php
include_once __DIR__.'/../model/product_model.php';

class ProductController extends Products{
    public function getProducts(){
        $results=$this->getProduct();
        return $results;
       }
}

?>