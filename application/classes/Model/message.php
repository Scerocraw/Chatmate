<?php

class Model_Message extends ORM {

    /**
     * Rules
     * @var type 
     */
    protected $_rules = array(
        'id' => array(
            'max_length' => 11,
        ),
        'userID' => array(
            'max_length' => 11,
        ),
        'message' => array(
            'max_length' => 500,
        ),
        'postTime' => array(
            'max_length' => 0,
        ),
    );
    
    /**
     * Add a message
     * @param type $userID
     * @param type $message
     * @return type
     */
    public static function addMessage($userID, $message) {
        // Message model
        $messageModel = ORM::factory('message');
        
        // Set properties
        $messageModel->userID = (int) $userID;
        $messageModel->message = htmlentities($message);
        $messageModel->postTime = date("Y-m-d H:i:s");
        
        // Save
        $messageModel->save();
        
        // Return messageModel
        return $messageModel->message;
    }
}
