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
        // Napisz program, który wypisuje liczby od 1 do 100. Ale dla wielokrotności trójki wyświetl "Fizz"
        // zamiast liczby oraz dla wielokrotności piątki wyświetl "Buzz". Dla liczb będących wielokrotnościami
        // trójki oraz piątki wyświetl "FizzBuzz".
        function FizzBuzz() {
            for($i=1;$i<=100;$i++) {
                if($i%3!=0 && $i%5!=0)
                    echo $i;
                if($i%3==0) 
                    echo 'Fizz';
                if($i%5==0) 
                    echo 'Buzz';
            }
        }
        
        abstract class Matchematic {
            protected $_count;
            protected $_tab;
            
            protected function __construct() {               
                $this->_tab = array(1,2,3,4,5);
            }
            
            protected function recursiveFunc() {
                
                echo  ' -> ' . ++$this->_count . ' ';
            
                foreach($this->_tab as $k => $v):
                    echo $v;
                endforeach;
            
                if($this->_count<=5) {
                    $this->recursiveFunc();
                }
                return $this->_count ;
            }
            
            abstract protected function silnia($x=5) ;
            
            abstract protected function recursiveSilnia() ;
        }
        
        class MyFacade extends Matchematic {
            
            public function __construct() {
                parent::__construct();
            }
          
            public function silnia($x=5) {
                $wynik = 1;
                
                if($x < 2) {
                    return 1;
                }
                for($i=$x; $i>0; $i--) {
                    $wynik *= $i;
                }
                return $wynik;
            }
            
            public function recursiveSilnia() {
                
            }
            
            public function getNumners() {
                $this->recursiveFunc();
            }
            
        }
        
           
        $testy = new MyFacade();
        echo 'Silnia:'  . $testy->silnia();
        echo '<br />';
        echo 'Seria liczb:';
        echo $testy->getNumners();
        ?>
    </body>
</html>
