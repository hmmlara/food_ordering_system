<?php

include_once __DIR__."/../model/contactreply_model.php";

class ContactReplyController extends ContactReply
{

    public function getContactReply($user_id)
    {
        $result=parent::getContactReply($user_id);
        return $result;
    }

    public function getContact($user_id)
    {
        $result=parent::getContact($user_id);
        return $result;
    }



}



?>