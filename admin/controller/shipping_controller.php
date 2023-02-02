<?php
include_once __DIR__.'/../model/shipping_model.php';

class ShippingController extends Shipping{
    public function getShipping(){
        $results=$this->getShippings();
        return $results;
    }

    public function editShipping($id){
        $result=$this->editShippings($id);
        return $result;
    }

    public function updateShipping($id,$township,$cost){
        $results=$this->updateShippings($id,$township,$cost);
        return $results;
    }

    public function addShipping($township,$cost){
        $results=$this->addShippings($township,$cost);
        return $results;
    }

    public function deleteShipping($id){
        $result=$this->deleteShippings($id);
        return $result;
    }
}


?>