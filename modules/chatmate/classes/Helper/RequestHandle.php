<?php

/**
 * 
 */
class ChatMate_RequestHandle {

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

    /**
     * Contains the bool for isAjax
     * @var type 
     */
    private static $_isAjax;

    /**
     * Setter isAjax
     * @param type Ajax
     */
    public static function setIsAjax($isAjax) {
        self::$_isAjax = $isAjax;
    }

    /**
     * Getter isAjax
     * @return type
     */
    public static function getIsAjax() {
        return self::$_isAjax;
    }

    /**
     * Contains the acutal protocol
     * @var type 
     */
    private static $_protocol;

    /**
     * Setter protocol
     * @param type $protocol
     */
    public static function setProtocol($protocol) {
        self::$_protocol = $protocol;
    }

    /**
     * Getter protocol
     * @return type
     */
    public static function getProtocol() {
        return self::$_protocol;
    }

    /**
     * Contains sanitized postData
     * @var type 
     */
    private static $_postData;

    /**
     * Setter postData
     * @param type $postData
     */
    public static function setPostData($postData) {
        self::$_postData = $postData;
    }

    /**
     * Getter postData
     * @return type
     */
    public static function getPostData() {
        return self::$_postData;
    }

    /**
     * Check if AJAX Request
     * @return boolean
     */
    protected static function checkIfAjax() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Returns HTTPS|HTTP
     * @return type
     */
    protected static function checkProtocol() {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "HTTPS" : "HTTP";
    }

    /**
     * Inits the RequestHandle
     * @param type $requestObject
     */
    public static function init($requestObject) {
        // Set the postData
        self::setPostData($requestObject->post());

        // Set URI
        self::setUri($requestObject::detect_uri());

        // Set protocol
        self::setProtocol(self::checkProtocol());

        // Set ajax bool
        self::setIsAjax(self::checkIfAjax());
    }

}
