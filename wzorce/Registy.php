<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Description of rejest
 *
 * @author Piotr Kaczorowski ctechnology.pl
 */

interface RegistyInterface {
    public static function get($name);
    public static function set($obj, $name);
    public static function contains($name);
    public static function remove($name);
}

class Registy implements RegistyInterface{
    
    private static $_store = array();

    public static function set($obj, $name = null){
        $name = (!is_null($name)) ? : get_class($obj);
        $name = strtolower($name);
        $result = null;
        
        if(!isset(self::$_store[$name])) {
            self::$_store[$name] = $obj;
        }
        
        $result = self::$_store[$name];
        return $result;
    }
    public static function get($name){
        
        if(!self::contains($name)) {
            throw new Exception("Nie ma takiego w rejsetrze.");
        }
        
        return self::$_store[$name];
    }
    /**
     * Check then object is in Registry
     * @param type $name
     * @return boolean
     */
    public static function contains($name){
        if(isset(self::$_store[$name])) {
            return true;
        }else{
            return false;
        }
    }
    public static function remove($name){
        if(self::contains($name)){
            unset(self::$_store[$name]);
        }
    }
}