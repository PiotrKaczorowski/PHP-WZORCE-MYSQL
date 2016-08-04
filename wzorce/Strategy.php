<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Strategy
 *
 * @author 2358
 */

interface AbstractStrategy {
    public function task();
}

class ConcretStrategy1 implements AbstractStrategy {
    public function task() {
        echo get_class();
    }
}

class ConcretStrategy2 implements AbstractStrategy {
    public function task() {
        echo get_class();
    }
}

class Context {
    private $_strategy;
    
    public function setStrategy(AbstractStrategy $obj) {
        $this->_strategy = $obj;
    }
    
    public function getStrategy() {
        return $this->_strategy;
    }
}


$context = new Context();
$context->setStrategy(new ConcretStrategy1);
$context->getStrategy()->task();
$context->setStrategy(new ConcretStrategy2);
$context->getStrategy()->task();