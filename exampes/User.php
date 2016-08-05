<?php

/**
 * Description of User
 *
 * @author 2358
 */
abstract class User {
    protected $login;
    protected $email;
    protected $passw;
    
    public function login() {
        return 'zaloguj';
    }
    public function logout() {
        return 'wyloguj';
    }
}

class Customer extends User{
    
    private $age;
    private $sex;
    
    /**
     * 
     * @param type $login
     * @param type $email
     * @param type $password
     * @param type $age
     * @param type $sex
     */
    public function __construct($login, $email, $password, $age, $sex) {
        $this->login = $login;
        $this->email = $email;
        $this->passw = $password;
        $this->age = $age;
        $this->sex = $sex;      
    }   
    
//    public function getLogin() {
//        return $this->login; 
//    }
//    public function geEmail() {
//        return $this->email; 
//    }
//    public function getPassw() {
//        return $this->passw; 
//    }
//    public function getAge() {
//        return $this->age; 
//    }
//    public function getSex() {
//        return $this->sex; 
//    }
    
}


$customer = new Customer('login', 'email@domain', 'password', 'age', 'sex');
echo $customer->login().PHP_EOL;
//echo $customer->getLogin().PHP_EOL;
//echo $customer->getAge().PHP_EOL;
echo $customer->logout().PHP_EOL;