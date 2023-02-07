<?php
include_once __DIR__.'/../model/delivery_model.php';

class DeliveryController extends Delivery{
    public function getDelivery(){
        $results=$this->getDeliveryInfo();
        return $results;
    }

    public function getDeli($id){
        $result=$this->getDeliInfo($id);
        return $result;
    }

    public function updateDelivery($id,$name){
        $results=$this->updateDeliInfo($id,$name);
        return $results;
    }
}
?>