<?php
include_once __DIR__.'/../model/order_model.php';

class OrderController extends OrderModel{
    public function getOrderinfo(){
        return $this->get_order_info();
    }
    public function getOrderDetails($id){
        return $this->get_order_details($id);
    }
    public function countOrders(){
        $results=parent::countOrders();
        return $results;
    }
}
?>