<?php
include_once __DIR__."/../model/user_model.php";


class UserController extends UserModel{
    public function getUser(){
        return $this->get_user();
    }
}

?>