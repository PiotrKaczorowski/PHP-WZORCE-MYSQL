<?php
/**
 * Połączenie singleton i registry
 */
include_once 'vars/config.php';
include_once 'wzorce/Singleton.php';
include_once 'wzorce/Registy.php';


// użycie zewnętrzne

//$write = new DBWrite;
//Registy::set($write);
//
//$read = new DBRead;
//Registy::set($read);
//
//    // dostęp do zarejestrowanych obj z dowolnego miejsca w kodzie 
//    // gdzie dostępna jest klasa Registry
//
//$read = Registy::get('dbread');
//$write = Registy::get('dbwrite');
//
//echo "<h2>Wynik z pobieranych obiektów - zewnętrzne wiązanie:</h2>";
//echo "<br />" . get_class($read) ;
//echo "<br />" . get_class($write);

// użycie wewnętrzne 

abstract class DBConnection extends PDO {
    static public function getInstance($name = null) {
        
        $class = get_called_class();
        
        $name = (!is_null($name))? : $class;
        
        if(!Registy::contains($name)) {
            $instance = new $class();
            Registy::set($instance, $name);
             
        }
        
        return Registy::get($name);
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