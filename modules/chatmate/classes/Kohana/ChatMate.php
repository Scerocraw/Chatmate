<?php

defined('SYSPATH') or die('No direct script access.');

/**
 *
 */
class Kohana_ChatMate extends Controller_Template {

    /**
     * Contains requestHandleObject
     * @var
     */
    protected static $_requestHandleObject;
    
    /**
     * Contains chatObject
     * @var type 
     */
    protected static $_chatObject;

    /**
     * Request Object
     * @var type 
     */
    private static $_requestObject;

    /**
     * Getter Request Object
     * @return type
     */
    public static function getRequestObject() {
        return self::$_requestObject;
    }

    /**
     * Setter Request Object
     * @param type $requestObject
     */
    public static function setRequestObject($requestObject) {
        self::$_requestObject = $requestObject;
    }

    /**
     * Response Object
     * @var type 
     */
    private static $_responseObject;

    /**
     * Getter Response Object
     * @return type
     */
    public static function getResponseObject() {
        return self::$_responseObject;
    }

    /**
     * Setter Response Object
     * @param type $responseObject
     */
    public static function setResponseObject($responseObject) {
        self::$_responseObject = $responseObject;
    }

    /**
     * Init function
     * @param $requestObject
     * @param $responseObject
     * @return string
     */
    public static function init($requestObject, $responseObject) {
        // Require HTTP Layer
        require_once MODPATH . '/chatmate/classes/Helper/RequestHandle.php';

        // Require HTTP Layer
        require_once MODPATH . '/chatmate/classes/Helper/Chat.php';

        // Set request object
        self::setRequestObject($requestObject);

        // Set response object
        self::setResponseObject($responseObject);

        // Init the requestHandle
        $requestHandleObject = self::$_requestHandleObject = new ChatMate_RequestHandle();
        $requestHandleObject::init($requestObject);

        $chatObject = self::$_chatObject = new ChatMate_Chat();
        $chatObject::init();
        
        // Check if node is available
        if($chatObject::getNodeJSChatIsAvailable()) {
            // Build network address
            $chatAddr = $requestHandleObject::getProtocol() . '://' . $_SERVER['SERVER_NAME'] . ':3000';
            
            // Relocate
            header("Location: $chatAddr");
        }

        // Done
        return TRUE;
    }

}