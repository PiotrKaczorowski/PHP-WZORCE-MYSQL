<?php

/**
 * Description of Reflection
 *
 * @author Piotr Kaczorowski
 */

/**
 * Return tab in good tempate 
 * @param type $val
 */
function printr($val) {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
}

/**
 * class for testing reflection 
 */
class Test {
    
    public $foo = '' ;
    public $bar = '' ;

    public function __construct() {  }
    
    public function displayFoo() {
        echo $this->foo."\n"; 
    }
    public function displayBar() {
        echo $this->bar."\n"; 
    }
    
}

/*
 * try example
 */

$obj = new Test();
$reflector = new ReflectionClass('Test');


$properties = $reflector->getProperties();
$i =1;

printr($properties);

foreach ($properties as $property) {
    $obj->{$property->getName()} = $i;
    $obj->{'display'.ucfirst($property->getName())}();
    
    $i++;
}
