<?php

/**
 * 
 */
class ChatMate_Ajax {

    /**
     * AJAX Routing
     * @param type $uri
     * @param type $uriParts
     * @param type $postData
     */
    public static function route($uri, $uriParts, $postData) {
        // jsonResponse
        $jsonResponse = false;
        
        // Handling
        switch ($uri) {
            // API Stuff
            case 'api':
                // API requires an operation - given in "uriParts"
                if(!isset($uriParts) || empty($uriParts) || !is_array($uriParts) || count($uriParts) <= 0) {
                    return FALSE;
                }
                
                // Require AJAX layer
                require_once MODPATH . '/chatmate/classes/Helper/Api.php';

                // Declare the API
                $api = new ChatMate_Api;
                
                // Call the proceed API
                $jsonResponse = $api::proceed($uriParts[0], $postData);
                break;
        }
        
        // Return the response
        echo json_encode($jsonResponse);die();
    }

}
