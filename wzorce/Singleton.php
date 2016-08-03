<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Description of singleton
 *
 * @author 2358
 */
trait Singleton { 
    
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

    use Singleton;
  
    public function __construct() {
        parent::__construct(APP_DB_WRITE_DNS, APP_DB_USER, APP_DB_PASSWORD); //'mysql:dbname=shellholiday;host=127.0.0.1','root',''
    }
}

class DBRead extends PDO {

    use Singleton;
  
    public function __construct() {
        parent::__construct(APP_DB_READ_DNS, APP_DB_USER, APP_DB_PASSWORD);
    }
}