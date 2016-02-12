<?php
/**
 * 
 */
class ChatMate_Ajax {

    /**
     * Contains URI
     * @var type 
     */
    private static $_uri = NULL;

    /**
     * Setter Uri
     * @param type $uri
     */
    public static function setUri($uri) {
        self::$_uri = $uri;
    }
    
    /**
     * Getter URI
     * @return type
     */
    public static function getUri() {
        return self::$_uri;
    }
}