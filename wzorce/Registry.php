<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Description of rejest
 *
 * @author Piotr Kaczorowski ctechnology.pl
 */

interface RegistryInterface {
    static public function get($name);
    static public function set($obj, $name);
    static public function contains($name);
    static public function remove($name);
}

class Registry implements RegistryInterface{

    static private $_store = array();

    static public function set($obj, $name = null){
        $name = (!is_null($name)) ? : get_class($obj);
        $name = strtolower($name);
        $result = null;

        if(!isset(self::$_store[$name])) {
            self::$_store[$name] = $obj;
        }

        $result = self::$_store[$name];

        return $result;
    }
    static public function get($name){

        if(!self::contains($name)) {
            throw new Exception("Nie ma takiego w rejestrze.");
        }

        return self::$_store[$name];
    }
    /**
     * Check then object is in Registry
     * @param type $name
     * @return boolean
     */
    static public function contains($name){

        if(!isset(self::$_store[$name])) {
            return false;
        }

        return true;

    }
    static public function remove($name){
        if(self::contains($name)){
            unset(self::$_store[$name]);
        }
    }
}