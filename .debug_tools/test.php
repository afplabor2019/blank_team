<?php
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 30.
 * Time: 12:50
 */

require_once 'lib/id.php';

for ($i = 0; $i<100; $i++){
    print ("ID $i:".ID::GenerateID(10)."<br>");
}