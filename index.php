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
                foreach ($observer as $key => $val) {
                    $this->_observers[] = $val;
                }              
            }

            public function remove(Observer $observer) {
                foreach ($this->_observers as $key => $val) {
                    unset($this->_observers[$key]);
                }
            }
            
            /**
             * 
             * @return type array obj
             */
            protected function getObservers() {
                return $this->_observers;
            }
            
            public function notifyAll() {
                echo '<br />z interfejsu';
            }

            protected function chroniona() {
                echo '<br />chroniona';
            }

        }
        class Observer {
            public $_name;
            
            public function __construct($name) {
                $this->_name = $name;
            }
        }
        
        class testowa extends BaseObservable {

            private $_observer;
            
//            function __construct(Observer $observer) {
//                $this->_observer = $observer;
//            }

            public function test() {
//                echo '<br /> zwykła klasa ';
//                $this->notifyAll();
//                $this->chroniona();
////                echo "<br /> obiekt Observer" . print_r(get_class_methods($this->_observer));
//                parent::notifyAll();
//                $this->add($this->_observer);
                print_r($this->getObservers());
            }

        }
        
        $testy = new testowa();
        $testy->add(new Observer('Piotr Kaczorowski'));
        $testy->add(new Observer('Jan Kaczorowski'));
        
        $testy->test();
//        $testy->notifyAll();
        ?>
    </body>
</html>
