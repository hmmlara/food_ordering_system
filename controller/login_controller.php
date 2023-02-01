<?php

include_once __DIR__."/../model/login_model.php";

class LoginController extends Login
{

    public function getUser($email,$password)
    {
        $result=parent::getUser($email,$password);
        return $result;
    }



}



?>