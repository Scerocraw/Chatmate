<?php

class Model_Apitoken extends ORM {

    /**
     * Rules
     * @var type 
     */
    protected $_rules = array(
        'id' => array(
            'max_length' => 11,
        ),
        'userID' => array(
            'max_length' => 11,
        ),
        'apiToken' => array(
            'max_length' => 32,
        ),
        'creationDate' => array(
            'max_length' => 0,
        )
    );

    /**
     * Generate token
     * @param type $userID
     * @return type
     */
    public static function generateToken($userID) {
        // Check if the token exists
        $checkToken = self::checkToken($userID);

        // Check if empty or contains the token
        if (!$checkToken) {
            // No token exists, generate one then
            $tokenModel = ORM::factory('apitoken');

            // Set properties
            $tokenModel->userID = (int) $userID;
            $tokenModel->apiToken = md5(time());
            $tokenModel->creationDate = date('Y-m-d H:i:s');

            // Save
            $tokenModel->save();

            return $tokenModel->apiToken;
        }

        // Return the existing token
        return $checkToken;
    }

    /**
     * Checks by an userID for a APIToken
     * @param type $userID
     * @return boolean
     */
    public static function checkToken($userID) {
        // Token Model
        $tokenModel = ORM::factory('apitoken')->where('userID', '=', (int) $userID)->find();

        // If the token exists, return the APIToken
        if ($tokenModel->id) {
            return $tokenModel->apiToken;
        }

        // Doesn't exists probably
        return FALSE;
    }

}
