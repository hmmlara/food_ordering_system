<?php
include_once __DIR__."/../model/report_model.php";
class ReportController extends Report{
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
    public function getPage($page){
        $result=$this->getPages($page);
        return $result;
      }

    public function getMonths(){
        $month=$this->getMonth();
        return $month;
    }  


    public function getAllResult(){
        $all=$this->getAllResults();
        return $all;
    }  
  
}

?>