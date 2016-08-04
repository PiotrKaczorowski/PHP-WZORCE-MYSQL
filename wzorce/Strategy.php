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

interface Tax {
    public function count($price);
}

class TaxPL implements Tax {
    public function count($price) {
        return 0.23 * $price;
    }
}

class TaxGermany implements Tax {
    public function count($price){
        return 0.20 * $price;
    }
}

class Context {
    private $_strategy;
    
    public function setCountry($countrySymbol) {
        switch($countrySymbol) {
            case 'PL':
                $this->_strategy = new TaxPL();
            case 'GER':
                $this->_strategy = new TaxGermany();
        }
        
        //$this->_strategy = $obj;
    }
    
    public function getTax() {
        return $this->_strategy;
    }
}


$context = new Context();
$context->setCountry('PL');
echo $context->getTax()->count(100);


//$context->setStrategy(new ConcretStrategy1);
//$context->getStrategy()->task();
//$context->setStrategy(new ConcretStrategy2);
//$context->getStrategy()->task();