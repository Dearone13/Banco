<?php

interface workAccount
{
    public function deposit();
    public function withdraw();
}

class Account {

    private $numAccount;
    private $userName;
    private $password; 
    private $typeAccount; 

    public function __construct($numAccount, $userName, $password, $typeAccount)
    {
        $this->numAccount = $numAccount;
        $this->userName = $userName;
        $this->password = $password;
        $this->typeAccount = $typeAccount;
    }
    
    public function setNumAccount($numAccount)
    {
        $this->numAccount = $numAccount;
    }
    
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setTypeAccount($typeAccount)
    {
        $this->$typeAccount = $typeAccount;
    }
}

class AccountSaving extends Account implements workAccount{

    public function deposit()
    {
   
    }

    public function withdraw()
    {
        
    }
}

class AccountCurrent extends Account implements workAccount{

    public function deposit()
    {
       
    }

    public function withdraw()
    {
        
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $numAccount = $_REQUEST[];
    $typeAccount = $_REQUEST[];
    $userName = $_REQUEST[];
    $password = $_REQUEST[];

}
?>
