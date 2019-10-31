<?php
//Webshop email: coolestwebshop@gmail.com 
//        pw:CoolestPasswordEver
// email küldés local-hoston: https://www.youtube.com/watch?v=qqm64zHlFUg
define('WSNAME','NAGYON KREATÍV WEBSHOP');
define('DOMAIN', 'http://localhost:8080/blank_team/');
define('LIB_PATH', 'lib/' );       

define('DBH', '127.0.0.1');         
define('DBN', 'webshop');    
define('DBU', 'root');              
define('DBP', '');                  

require_once LIB_PATH . 'str.php';
require_once LIB_PATH . 'sql.php';
require_once LIB_PATH . 'debug.php';
require_once LIB_PATH . 'enum.php';
require_once LIB_PATH . 'id.php';