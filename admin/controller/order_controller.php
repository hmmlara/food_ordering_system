<?php
include_once __DIR__.'/../model/order_model.php';

class OrderController extends OrderModel{
    public function getOrderinfo(){
        return $this->get_order_info();
    }
}
?>