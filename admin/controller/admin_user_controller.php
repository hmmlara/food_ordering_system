<?php
include_once __DIR__."/../model/admin_user_model.php";
class UserController extends UserModel{
    public function getUser(){
        return $this->get_user();
    }
    public function getCustomers(){
        return $this->get_customers();
    }
}
?>