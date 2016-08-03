<?php

include_once 'Singleton.php';
include_once 'Registry.php';


// użycie
// zewnętrzne
$read = new DBRead;
Registy::set($read);

$write = new DBWrite;
Registy::set($write);

// dostęp do zarejestrowanych obj z dowolnego miejsca w kodzie 
// gdzie dostępna jest klasa Registry

$read = Registy::get('DBRead');
$write = Registy::get('DBWrite');

