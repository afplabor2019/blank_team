<?php
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 17.
 * Time: 9:30
 */

/*
 * More secure than a serial id.
 * with 5 digits we will have 64^5=1_073_741_824 unique id, more than enough
 */
class ID
{

    /**
     * Generate Safe ID. Uniqueness should be checked!
     * @param int $digits digits to generate. Default = 5
     * @return string
     */
    static function GenerateID($digits = 5){
        $chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ";
        $result = "";
        for ($i = 0; $i < $digits; $i++){
            $result .= $chars[rand(0,strlen($chars)-1)];
        }
        return $result;
    }
}