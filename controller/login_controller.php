<?php

include_once __DIR__."/../model/login_model.php";

class LoginController extends Login
{

    public function getUser($email,$password)
    {
        $result=parent::getUser($email,$password);
        return $result;
    }

    public function setUser_SessionId($user_session_id,$user_id)
    {
        $result= parent::setUser_SessionId($user_session_id,$user_id);
        return $result;
    }

    public function getUser_SessionId($user_id)
    {
        $result= parent::getUser_SessionId($user_id);
        return $result;
    }

}



?>