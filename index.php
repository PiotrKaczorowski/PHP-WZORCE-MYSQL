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
                    unset($this->_observers[$key]);
                }
            }

            public function notifyAll() {
                echo '<br />z interfejsu';
            }

            protected function chroniona() {
                echo '<br />dziedziczona';
            }

        }

        class testowa extends BaseObservable {

//            private $_observer;
//            
//            function __construct(Observer $observer) {
//                $this->_observer = $observer;
//            }

            public function test() {
                echo '<br /> zwykła klasa ';
                $this->notifyAll();
                $this->chroniona();
                //parent::notifyAll();
                //$this->add($this->_observer);
            }

        }

        $testy = new testowa();
        $testy->test();
        //$testy->notifyAll();
        ?>
    </body>
</html>
