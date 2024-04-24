<?php

interface workAccount
{
    public function deposit($amount);
    public function withdraw($amount);

}

class Account 
{

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

    public function getNumAccount()
    {
        return $this->numAccount;  
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getTypeAccount()
    {
        return $this->typeAccount;
    }

}

class AccountSaving extends Account implements workAccount{

    private $balance;

    public function  __construct($numAccount, $userName, $password, $typeAccount){
        parent::__construct($numAccount,$userName,$password, $typeAccount);

        $this->numAccount = $numAccount;
        $this->userName = $userName;
        $this->password = $password;
        $this->typeAccount = $typeAccount;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {

        if($amount <= $this->balance){
            $this->balance -= $amount;
        }

    }

    public function getBalance(){

        return $this->balance;

    }

    public function Percentage()
    {
        
        $startDate = strtotime('2022-01-01');
        $endDate = strtotime('2023-12-31');
        $randomDate = rand($startDate,$endDate);
        $randomDateS = date('Y-m-d',$randomDate);
        $day = date('d',$randomDate);
        if($day == '01'){
            $this->balance += $this->balance*0.05;
        }

    }
}

class AccountCurrent extends Account implements workAccount{

    private $balance;

    public function  __construct($numAccount, $userName, $password, $typeAccount){
        parent::__construct($numAccount,$userName,$password, $typeAccount);

        $this->numAccount = $numAccount;
        $this->userName = $userName;
        $this->password = $password;
        $this->typeAccount = $typeAccount;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;  
    }

    public function withdraw($amount)
    {
        $lost = ($amount*4)/1000;
        if(($this->balance - $amount) <= -300.000){
            $this->balance -= $amount +$lost;
        }else{
            $messague = 'Usted excedio su saldo, tendra un sobregiro de $ -300,000';
        }   
        $this->balance -= $amount;
    }

    public function getBalance(){
        return $this->balance;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $numAccount = $_POST["numAccount"];
    $typeAccount = $_POST["typeAccount"];
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    echo "Número de cuenta: " . $numAccount . ", Tipo de cuenta: " . $typeAccount . ", Nombre de usuario: " . $userName . ", Contraseña: " . $password;


    $startDate = strtotime('2022-01-01');
    $endDate = strtotime('2023-12-31');
    $randomDate = rand($startDate,$endDate);
    $randomDateS = date('Y-m-d',$randomDate);
    $day = date('d',$randomDate);
    echo "\n".$randomDateS. "  ". $day;

    
    // if($typeAccount == "Cuenta corriente"){
    //     $AccountCurrent = new AccountCurrent($numAccount, $userName, $password, $typeAccount);
    // }
}
?>
