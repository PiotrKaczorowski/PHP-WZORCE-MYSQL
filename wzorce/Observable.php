<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        interface Observable {

            public function add(Observer $observer);

            public function remove(Observer $observer);

            public function notifyAll();
        }

        abstract class BaseObservable implements Observable {

            private $_observers = array();

            public function add(Observer $observer) {
                $this->_observers[] = $observer;
            }

            public function remove(Observer $observer) {
                foreach ($this->_observers as $key => $val) {
                    if($val == $observer) {
                        unset($this->_observers[$key]);
                    }
                }
            }   
            
            protected function getObservers() {
                return $this->_observers;
            }

        }

        class Observer {

            public $_name;

            public function __construct($name) {
                $this->_name = $name;
            }

        }
        
        class ExtendedObs extends BaseObservable {
            
            public function notifyAll() {
                echo '<br />klasa Rozszerzająca, która rozszerza funkcje Abstrakcji (implementacja wynika z interfejsu)';
                echo '<br />' . PHP_EOL;
                print_r($this->getObservers()) . PHP_EOL;
            }
         
        }


        $testy = new ExtendedObs();
        
        $obj1 = new Observer('Piotr Kaczorowski');        
        $obj2 = new Observer('Jan Kaczorowski');
        $obj3 = new Observer('Albert Einstein');
        
        $testy->add($obj1);
        $testy->add($obj2);
        $testy->add($obj3);
        
        $testy->remove($obj2);
        
        $testy->notifyAll();
        

        ?>
    </body>
</html>
