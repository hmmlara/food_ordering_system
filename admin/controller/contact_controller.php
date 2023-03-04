<?php
include_once __DIR__.'/../model/contact_model.php';

class ContactController extends Contacts{
    public function getContacts()
    {
        $results = parent::getContacts();
        return $results;
    }

    // public function getContactReply()
    // {
    //     $results = parent::getContactReply();
    //     return $results;
    // }

    
    // public function addContactReply($contact_id, $message, $user_id)
    // {
    //     $results = parent::addContactReply($contact_id, $message, $user_id);
    //     return $results;
    // }

}

?>