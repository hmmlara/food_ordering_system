<?php

include_once __DIR__."/../model/viewCart_model.php";

class ViewCartController extends ViewCart
{

    public function addOrder($user_id, $delitype, $paytype, $total_balance, $address, $phone)
    {
    $results=parent::addOrder($user_id, $delitype, $paytype, $total_balance, $address, $phone);
    return $results;
    }

    public function getOrderMaxID($user_id)
    {
        $results=parent::getOrderMaxID($user_id);
        return  $results;
    }

    public function add_order_details($order_id, $product_id, $product_qty)
    {
        $results = parent::add_order_details($order_id, $product_id, $product_qty);
        return $results;
    }

    public function get_order($user_info_id)
    {
        $results = parent::get_order($user_info_id);
        return $results;
    }

    public function get_orderDetails($order_id)
    {
        $results = parent::get_orderDetails($order_id);
        return $results;
    }

    public function get_products()
    {
        $results  = parent::get_products();
        return $results;
    }

    public function get_OrderStatus($order_id)
    {
        $results = parent::get_OrderStatus($order_id);
        return $results;
    }



}



?>