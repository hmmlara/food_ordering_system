<?php

include_once __DIR__."/../model/user_model.php";

class UserController extends User
{
    public function getUsers()
    {
        $results=parent::getUsers();
        return $results;
    }

    public function getUser($id)
    {
        $result=parent::getUser($id);
        return $result;
    }


    public function updateUser($id, $name, $email, $phone_number, $address, $new_password)
    {
        $result=parent::updateUser($id, $name, $email, $phone_number, $address, $new_password);
        return $result;
    }




    public function countCustomers(){
        $results=parent::countCustomers();
        return $results;
    }

}



?>