<?php
include_once __DIR__.'/../model/order_model.php';

class OrderController extends OrderModel{
    public function getOrderinfo(){
        return $this->get_order_info();
    }
<<<<<<< HEAD
    // public function getOrderDetails($id){
    //     return $this->
    // }
=======
    public function getOrderDetails($id){
        return $this->get_order_details($id);
    }
>>>>>>> 49ed24ae8e07bd11a6176d27720133e57bf4d5a0
}
?>