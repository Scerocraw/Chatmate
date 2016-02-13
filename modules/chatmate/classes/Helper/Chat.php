<?php

/**
 * 
 */
class ChatMate_Chat {

    /**
     * Boolean if nodeJS Chat is available
     * @var type 
     */
    private static $_nodeJSChatIsAvailable;

    /**
     * Setter for the NodeJS Chat Availability
     * @param type $nodeIsAvailable
     */
    public static function setNodeJSChatIsAvailable($nodeIsAvailable) {
        self::$_nodeJSChatIsAvailable = $nodeIsAvailable;
    }

    /**
     * Getter for the NodeJS Chat Availability
     * @return type
     */
    public static function getNodeJSChatIsAvailable() {
        return self::$_nodeJSChatIsAvailable;
    }

    /**
     * Check if the NodeJS Chat is available
     * @param type $port
     * @return type
     */
    protected static function checkNodeJSChat($port) {
        // Check if the port is available
        try {
            if (fsockopen($_SERVER['SERVER_NAME'], (int) $port, $errno, $errstr)) {
                return TRUE;
            }
        } catch (Exception $e) {
            
        }
        return FALSE;
    }

    /**
     * Init the chat
     */
    public static function init() {
        // Check on port 3000 the availability 
        self::setNodeJSChatIsAvailable(self::checkNodeJSChat(3000));
    }

}
