<?php

class ChatMate_Api {

    /**
     * Proceeding on API
     * @param type $apiFunction
     * @param type $postData
     */
    public static function proceed($apiFunction, $postData) {
        // Contains the return
        $returnContainer = array();

        // Different on API functions
        switch ($apiFunction) {
            case 'addMessage':
                // Message model
                $messageModel = ORM::factory('message');

                // Get the Session
                $session = Session::instance();
                $userID = $session->get('userID');

                // Validate the userID
                if (isset($userID) && !empty($userID)) {
                    // Add message
                    $returnContainer = array('status' => $messageModel::addMessage($userID, $postData['message']));
                }
                break;
            case 'getMessages':
                // Get the Session
                $session = Session::instance();

                // Message Offset
                $messageOffset = $session->get('messageOffset');
                
                // Check if there is already a message offset
                if (!isset($messageOffset) || empty($messageOffset)) {
                    $messageOffset = 0;
                }
                // Message model
                $messageResponse = ORM::factory('message')->where('id', '>', $messageOffset)->order_by('postTime', 'ASC')->limit(100)->find_all()->as_array();

                // UserContainer
                $userContainer = $session->get('userContainer');
                
                // Check if we have return messages
                if (isset($messageResponse) && !empty($messageResponse) && is_array($messageResponse)) {
                    // Iterate all new messages
                    foreach ($messageResponse as $key => $message) {                        
                        // Check if the user already exists
                        if(!isset($userContainer[$message->userID])) {
                            // Get the user by id
                            $user = ORM::factory('user')->where('id', '=', $message->userID)->find();
                            
                            // Add user into lib
                            $userContainer[$message->userID] = $user->username;
                            
                            // Update internal userLIB
                            $session->set('userContainer', $userContainer);
                        }
                        
                        $date = new DateTime($message->postTime);

                        // Add every message into returnContainer
                        $returnContainer[] = array(
                            'message' => html_entity_decode($message->message),
                            'user' => $userContainer[$message->userID],
                            'postTime' => $date->format("H:i:s d/m/Y")
                        );

                        // Update message offset
                        $session->set('messageOffset', $message->id);
                    }
                }
                break;
            default:
                break;
        }

        // Returns the returnContainer
        return $returnContainer;
    }

}
