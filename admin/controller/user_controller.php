<?php
include_once __DIR__."/../model/user_model.php";
class UserController extends UserModel{
    public function getUser(){
        return $this->get_user();
    }
    public function getCustomers(){
        return $this->get_customers();
    }
    public function getCustomerDetails($id){
        return $this->get_customer_details($id);
    }
}
?>