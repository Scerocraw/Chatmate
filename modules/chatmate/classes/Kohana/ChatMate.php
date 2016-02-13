<?php

defined('SYSPATH') or die('No direct script access.');
error_reporting(E_ALL & ~E_DEPRECATED);

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
     * Contains the template
     * @var type 
     */
    private static $_template = 'welcome.tpl';
    
    /**
     * Setter template
     * @param type $template
     */
    public static function setTemplate($template) {
        self::$_template = $template;
    }
    
    /**
     * Getter template
     * @return type
     */
    public static function getTemplate() {
        return self::$_template;
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
        // Require request layer
        require_once MODPATH . '/chatmate/classes/Helper/RequestHandle.php';

        // Require chat heleper
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

        // Get the session
        $session = Session::instance();
        
        // Check if we are logged in
        if (!empty($session->get('username'))) {
            // Check if node is available
            if ($chatObject::getNodeJSChatIsAvailable()) {
                // Build network address
                $chatAddr = $requestHandleObject::getProtocol() . '://' . $_SERVER['SERVER_NAME'] . ':3000';

                // Relocate
                header("Location: $chatAddr");
            } else {
                // Get view
                self::setTemplate('html/index.tpl');
            }
        }

        // Done
        return TRUE;
    }

}
