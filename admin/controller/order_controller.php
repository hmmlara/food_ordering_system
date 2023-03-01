<?php
include_once __DIR__.'/../model/order_model.php';

class OrderController extends OrderModel{
    public function getOrderinfo(){
        return $this->get_order_info();
    }
    public function getOrderDetails($id){
        return $this->get_order_details($id);
    }
    public function getSpecificOrder($id){
       return $this-> get_specific_order($id);
    }
    public function getDeliType(){
        return $this-> get_deli_type();
    }
    
    public function updateOrderStatus($status,$order_id){
        return $this->update_order_status($status,$order_id);
    }
}
?>