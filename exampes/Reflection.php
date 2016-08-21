<?php

/**
 * Description of Reflection
 *
 * @author Piotr Kaczorowski
 */
class Test {
    
    public $foo = '' ;
    public $bar = '' ;

    public function __construct() {  }
    
    public function echoFoo() {
        echo $this->foo."\n"; 
    }
    public function echoBar() {
        echo $this->bar."\n"; 
    }
}


$obj = new Test();
$reflector = new ReflectionClass('Test');
$i =1;
$properties = $reflector->getProperties();

foreach ($properties as $property) {
    $obj->{$property->getName()} = $i;
    $obj->{'echo'.ucfirst($property->getName())}();
    
    $i++;
}
echo '<pre>';
print_r($properties);