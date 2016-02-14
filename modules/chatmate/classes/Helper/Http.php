<?php

/**
 * 
 */
class ChatMate_Http {

    /**
     * HTTP Routing
     * @param type $uri
     * @param type $uriParts
     * @param type $postData
     */
    public static function route($uri, $uriParts, $postData) {
        // Json response
        $jsonResponse = false;

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
            // API Stuff
            case 'api':
                // API requires an operation - given in "uriParts"
                if (!isset($uriParts) || empty($uriParts) || !is_array($uriParts) || count($uriParts) <= 0) {
                    return FALSE;
                }

                // Require AJAX layer
                require_once MODPATH . '/chatmate/classes/Helper/Api.php';

                // Declare the API
                $api = new ChatMate_Api;

                // Call the proceed API
                $jsonResponse = $api::proceed($uriParts[0], $postData);
                break;
            case 'admin':
                // Get the current session
                $session = Session::instance();
                
                // Is admin needle
                $isAdmin = $session->get('isAdmin');
                
                // Check if is admin
                if($isAdmin) {
                    // Update template
                    ChatMate::setTemplate('admin/index.tpl');
                }
                
                break;
        }

        // Check if jsonResponse is given        
        if ($jsonResponse) {
            echo json_encode($jsonResponse);
            die();
        }
    }

}
