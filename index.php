<?php
/**
 * Połączenie singleton i registry
 */
include_once 'vars/config.php';
include_once 'wzorce/Singleton.php';
include_once 'wzorce/Registry.php';


// użycie zewnętrzne

$write = new DBWrite;
Registry::set($write);
//
$read = new DBRead;
Registry::set($read);

    // dostęp do zarejestrowanych obj z dowolnego miejsca w kodzie 
    // gdzie dostępna jest klasa Registry

$read = Registry::get('dbread');
$write = Registry::get('dbwrite');
//
echo "<h2>Wynik z pobieranych obiektów - zewnętrzne wiązanie:</h2>";
echo "<br />" . get_class($read) ;
echo "<br />" . get_class($write);

// użycie wewnętrzne 

abstract class DBConnection extends PDO {
    
    static public function getInstance($name = null) {
      
        $class = get_called_class();
      
        $name = (!is_null($name)) ? $name : $class;

        if(!Registry::contains($name)) {
            $instance = new $class();
            $return = Registry::set($instance, $name);
        }else{
            $return = Registry::get($name);
        }
        return $return;
    }
}

class DBWriteConnection extends DBConnection{
    
    public function __construct() {
        parent::__construct(APP_DB_WRITE_DNS, APP_DB_WRITE_USER, APP_DB_WRITE_PASSWORD);
    }
}

class DBReadConnection extends DBConnection {

    public function __construct() {
        parent::__construct(APP_DB_READ_DNS, APP_DB_READ_USER, APP_DB_READ_PASSWORD);
    }
}

$writeConn = DBWriteConnection::getInstance();
$readConn  = DBReadConnection::getInstance();
$readInnyCelDlaObjConn = DBReadConnection::getInstance('InnyCelDlaObj');

echo "<h2>Wynik z pobieranych obiektów - wnętrzne wiązanie:</h2>";
echo '<pre>';
echo "<br />" . get_class($writeConn);
echo "<br />" . get_class($readConn);
echo "<br />" . get_class($readInnyCelDlaObjConn);