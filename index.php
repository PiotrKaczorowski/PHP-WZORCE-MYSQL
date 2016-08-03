<?php
/**
 * Połączenie singleton i registry
 */
include_once 'vars/config.php';
include_once 'wzorce/Singleton.php';
include_once 'wzorce/Registry.php';


// użycie zewnętrzne

//$write = new DBWrite;
//Registry::set($write);
//
//$read = new DBRead;
//Registry::set($read);
//
//    // dostęp do zarejestrowanych obj z dowolnego miejsca w kodzie 
//    // gdzie dostępna jest klasa Registry
//
//$read = Registry::get('dbread');
//$write = Registry::get('dbwrite');
//
//echo "<h2>Wynik z pobieranych obiektów - zewnętrzne wiązanie:</h2>";
//echo "<br />" . get_class($read) ;
//echo "<br />" . get_class($write);

// użycie wewnętrzne 

abstract class DBConnection extends PDO {
    static public function getInstance($name = null) {
        
        $class = get_called_class();
        
        $name = (!is_null($name))? : $class;
        
        if(!Registry::contains($name)) {
            $instance = new $class();
            Registry::set($instance, $name);
             
        }
        
        return Registry::get($name);
    }
}

class DBWriteConnection extends DBConnection{
    public function __construct() {
        parent::__construct(APP_DB_WRITE_DNS, APP_DB_USER, APP_DB_PASSWORD);
    }
}

class DBReadConnection extends DBConnection {
    public function __construct() {
        parent::__construct(APP_DB_READ_DNS, APP_DB_USER, APP_DB_PASSWORD);
    }
}

$writeConn = DBWriteConnection::getInstance();
//$readConn  = DBReadConnection::getInstance();
//$readInnyCelDlaObjConn = DBReadConnection::getInstance('InnyCelDlaObj');

echo "<h2>Wynik z pobieranych obiektów - wnętrzne wiązanie:</h2>";
//echo "<br />" . var_dump($writeConn) ;
//echo "<br />" . var_dump($readConn);
//echo "<br />" . var_dump($readInnyCelDlaObjConn);