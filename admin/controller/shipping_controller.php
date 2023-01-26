<?php
include_once __DIR__.'/../model/shipping_model.php';

class ShippingController extends Shipping{
    public function getShipping(){
        $results=$this->getShippings();
        return $results;
    }
}



?>