<?php
include_once __DIR__."/../model/admin_user_model.php";
class UserController extends UserModel{
    public function getAdmin(){
        return $this->get_admin();
    }
    public function getCustomers(){
        return $this->get_customers();
    }
    public function getDeafultUser(){
        return $this->get_default_user();
    }
}
?>