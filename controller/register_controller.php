<?php

include_once __DIR__."/../model/register_model.php";

class RegisterController extends Register
{
    public function createUser($name,$phone_number,$address,$email,$password)
    {
        $results=parent::createUser($name,$phone_number,$address,$email,$password);
        return $results;
    }




}



?>