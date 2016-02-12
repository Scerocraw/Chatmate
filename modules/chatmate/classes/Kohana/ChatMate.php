<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 */
class Kohana_ChatMate extends Controller_Template {

    /**
     * Contains httpObject
     * @var
     */
    private static $_httpObject;

    /**
     * Init function
     * @param $requestObject
     * @param $responseObject
     * @return string
     */
    public static function init($requestObject, $responseObject) {
        // Require HTTP Layer
        require_once  MODPATH . '/chatmate/classes/Helper/Http.php';

        // Set http Object
        $httpObject = self::$_httpObject = new ChatMate_Http();


        // Done
        return TRUE;
    }

}