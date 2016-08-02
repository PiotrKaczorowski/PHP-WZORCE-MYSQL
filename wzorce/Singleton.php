<?php
// nie da sie zrobić singletona bo w PDO konstruktor jest public
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of singleton
 *
 * @author 2358
 */
trait Singleton { //extends PDO 
    
    private static $_instance = null;

    public static function getInstance() {

        $class = __CLASS__;
        
        if(!(self::$_instance instanceof $class)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

}


class DBWrite extends PDO {
//    private static $_instance = null;
//
//    public static function getInstance() {
//
//        $class = __CLASS__;
//        
//        if(!(self::$_instance instanceof $class)) {
//            self::$_instance = new $class();
//        }
//        return self::$_instance;
//    }
   
    use Singleton;
  
    public function __construct() {
        parent::__construct('mysql:dbname=shellholiday;host=127.0.0.1','root','');
    }
}

$obj = DBWrite::getInstance();
var_dump($obj);
