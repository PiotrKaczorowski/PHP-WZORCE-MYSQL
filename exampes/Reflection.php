<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reflection
 *
 * @author 2358
 */
class Test {
    
    private $_foo ;
    private $_bar ;

    public function __construct() {
        $this->_foo = 'foo';
        $this->_bar = 'bar';
    }
    
    public function ecboFoo() {
        echo $this->_foo; 
    }
    public function echoBar() {
        echo $this->_bar; 
    }
}
