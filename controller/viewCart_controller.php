<?php

include_once __DIR__."/../model/viewCart_model.php";

class ViewCartController extends ViewCart
{
    public function getViewCart($user_id)
    {
        $results=parent::getViewCart($user_id);
        return $results;
    }

    public function getDetailCart($product_id)
    {
        $results=parent::getDetailCart($product_id);
        return $results;
    }
    
    public function getProductFromCategory($category_id)
    {
        $results=parent::getProductFromCategory($category_id);
        return $results;
    }




}



?>