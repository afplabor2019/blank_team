<?php
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 17.
 * Time: 9:28
 */

abstract class BasicEnum {
    private static $constCacheArray = NULL;

    /**
     * Get valid values
     * @return bool|mixed
     */
    private static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            try {
                $reflect = new ReflectionClass($calledClass);
                self::$constCacheArray[$calledClass] = $reflect->getConstants();
            } catch (ReflectionException $e) {
                return false;
            }
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * Is param a valid enum?
     * @param $name
     * @param bool $strict
     * @return bool
     */
    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }


    /**
     * Is param a valid value?
     * @param $value
     * @param bool $strict
     * @return bool
     */
    public static function isValidValue($value, $strict = true) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
}