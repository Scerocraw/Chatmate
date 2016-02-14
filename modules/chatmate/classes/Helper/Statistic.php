<?php

class ChatMate_Statistic {
    
    /**
     * Get a statistic
     * @param type $type
     * @param type $time
     * @return type
     */
    public static function getStatistic($type, $time = 'today') {
        // Contains latter on statistics
        $statisticContainer = array();
        
        // Date Format
        $dateFormat = 'Y-m-d';
        
        // Today
        $today = date($dateFormat);
        
        // Different time interval
        $timeInterval = array(
            'today'     => $today,
            'month'     => date ("Y-m"),
            'year'      => date ("Y")
        );
        
        // Check if we need to select all
        if($time === 'all') {
            // Get all array keys
            $timeToCheck = array_keys($timeInterval);
        } elseif(isset($timeInterval[$time])) {
            // Otherwise just get the timeInterval
            $timeToCheck = $timeInterval[$time];
        }
        
        // If this is an array, iterate all
        if(is_array($timeToCheck)) {
            foreach($timeToCheck as $key => $value) {
                $statisticContainer[$value] = self::getSingleStatistic($type, $timeInterval[$value]);
            }
        } else {
            // Just get the single statistic type
            $statisticContainer[] = self::getSingleStatistic($type, $timeToCheck);
        }
        
        // Return statistic container
        return $statisticContainer;
    }
    
    /**
     * Get statistic
     * @param type $type
     * @param type $time
     * @return type
     */
    private static function getSingleStatistic($type, $time) {
        // Response container
        $responseContainer = array();
        
        // Switch on type
        switch($type) {
            case 'newUser':
                $userModel = ORM::factory('user')->where('firstLogin', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer[$type] = count($userModel);
                break;
            case 'onlineUser':
                $userModel = ORM::factory('user')->where('lastLogin', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer[$type] = count($userModel);
                break;
            case 'message':                
                $messageModel = ORM::factory('message')->where('postTime', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer[$type] = count($messageModel);
                break;
            case 'all':
                $newUserModel = ORM::factory('user')->where('firstLogin', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer['newUser'] = count($newUserModel);
                
                $onlineUserModel = ORM::factory('user')->where('lastLogin', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer['onlineUser'] = count($onlineUserModel);
                
                $messageModel = ORM::factory('message')->where('postTime', 'LIKE', '%' . $time . '%')->find_all()->as_array();
                $responseContainer['message'] = count($messageModel);
                break;
        }
        
        // Return the response 
        return $responseContainer;
    }
}