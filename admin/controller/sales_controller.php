<?php
include_once __DIR__."/../model/sales_model.php";
class SalesController extends Sales{
    public function getSales(){
        return $this->getSale();
    }

    public function getItem(){
        return $this->getItems();
    }

    public function getTotalItem(){
        return $this->getTotalItems();
    }

    public function getOrderDates(){
        return $this->getOrderDate();
    }
    // public function getSalesPage($page){
    //     $result=$this->getSalesPages($page);
    //     return $result;
    //   }

    public function getMonths(){
        $month=$this->getMonth();
        return $month;
    }  


    public function getAllResult(){
        $all=$this->getAllResults();
        return $all;
    }  

    public function getChats(){
        $chat=$this->getChat();
        return $chat;
    }

    public function getSellingProducts(){
        $selling_product=$this->getSellingProduct();
        return $selling_product;
    } 
  
}

?>