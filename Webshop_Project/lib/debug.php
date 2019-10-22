<?php 
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 17.
 * Time: 9:09
 */


//define('DEBUG', true); //Change this to false on release!

class Debug
{

    /**
     * Create hidden input, so js can read value of DEBUG constant
     */
    static function JsDebug(){
        echo '<input type="hidden" id="DEBUG_VAL" value="'.DEBUG.'" />';
    }

    /**
     * Console logging
     * @param $data string write to log
     */
    static function ConsoleLog($data)
    {
        if (DEBUG) {
            $output = $data;
            if (is_array($output)) $output = implode(',', $output);
            echo "<script>console.log( 'Debug: " . $output . "' );</script>";
        }
    }

    /**
     * Dump a variable type, value, etc.
     * @param $data object object to inspect
     * @param string $name [name of the object] Default = ''
     * @param string $newLine [new line character] Default = '<br>'
     */
    static function Dump($data, $name = '', $newLine = '<br>')
    {
        if (DEBUG) {
            echo $newLine . '------------VAR_DUMP: ' . $name . ' -----------' . $newLine;
            var_dump($data);
            echo $newLine . '----------------------------------------' . $newLine;
        }
    } 
} 