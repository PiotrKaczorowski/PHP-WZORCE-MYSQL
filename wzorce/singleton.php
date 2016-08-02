<?php

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
class Singleton extends PDO{
    
    private static $instance;
    
    private function __construct() {
        parent::__construct(APP_DB_DNS, APP_DB_USER, APP_DB_PASS, APP_DB);
    }
    
    public static function getConnection() {
                
        if(!(self::$instance instanceof Singleton)) {
            self::$instance = new Singleton();
        }
        
        return self::$instance;
    }
    
}
