<?php
/**
 * Połączenie singleton i registry
 */
include_once 'vars/config.php';
include_once 'wzorce/Singleton.php';
include_once 'wzorce/Registy.php';


// użycie zewnętrzne
$read = new DBRead;
Registy::set($read);

$write = new DBWrite;
Registy::set($write);

    // dostęp do zarejestrowanych obj z dowolnego miejsca w kodzie 
    // gdzie dostępna jest klasa Registry

$read = Registy::get('DBRead');
$write = Registy::get('DBWrite');

// użycie wewnętrzne 

abstract class DBConnection extends PDO {
    static public function getInstance($name = null) {
        
        $class = get_called_class();
        
        $name = (!is_null($name))? : $class;
        
        if(Registy::contains($name)) {
            return Registy::get($name);
        }else {
            $instance = new $class();
            Registy::set($instance, $name);
        }
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
$readConn  = DBReadConnection::getInstance();
$readInnyCelDlaObjConn = DBReadConnection::getInstance('InnyCelDlaObj');