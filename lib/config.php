<?php
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 17.
 * Time: 9:18
 */

//define('DEBUG', true);              //In production?
define('DOMAIN', 'http://localhost:8080/blank_team/');
define('LIB_PATH', 'lib/' );        //Lib folder

define('DBH', 'localhost');         //Database host
define('DBN', 'afp_blank_team');    //Database name
define('DBU', 'root');              //User name for db
define('DBP', '');                  //USer password for db

require_once LIB_PATH . 'str.php';//config.php is included in index.php, so path is calculated from index
require_once LIB_PATH . 'sql.php';
require_once LIB_PATH . 'debug.php';
require_once LIB_PATH . 'enum.php';
require_once LIB_PATH . 'id.php';