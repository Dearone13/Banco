<?php
class Account{

    private $numAccount;
    private $userName;
    private $balance;

    public function __construct(){
        $this->numAccount = null;
        $this->userName = null;
        $this->balance = null;
    }

    public function setnumAccount(){

    }
    public function setUserName(){

    }
    public function setBalance(){
        
    }

}
//Implements and extend

interface workAccount{
    public function createAccount();
    public function setUserName();

}





?>