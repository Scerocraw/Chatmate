<?php

/**
 * 
 */
class ChatMate_Http {

    public static function route($uri, $uriParts, $postData) {
        switch ($uri) {
            case 'register':
                $userModel = ORM::factory('user');

                $userModel::register($postData);
                break;
            case 'login':
                $userModel = ORM::factory('user');

                $userModel::login($postData);
                break;
            case 'logout':
                // Get the current session
                $session = Session::instance();
                
                // DESTROY
                $session->destroy();
                
                // Relocate
                header("Location: /");
                break;
        }
    }

}
