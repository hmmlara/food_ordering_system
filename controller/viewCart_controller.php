<?php

include_once __DIR__."/../model/viewCart_model.php";

class ViewCartController extends ViewCart
{
    public function getViewCart($user_id)
    {
        $results=parent::getViewCart($user_id);
        return $results;
    }

    public function getDetailCart($user_id,$product_id)
    {
        $results=parent::getDetailCart($user_id,$product_id);
        return $results;
    }
    




}



?>