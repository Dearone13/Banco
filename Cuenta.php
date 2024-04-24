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

    private static $instance;

    public function  __construct($numAccount, $userName, $password, $typeAccount){
        parent::__construct($numAccount,$userName,$password, $typeAccount);

        $this->numAccount = $numAccount;
        $this->userName = $userName;
        $this->password = $password;
        $this->typeAccount = $typeAccount;
        $this->balance = 200;

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

    public static function getInstance($numAccount, $userName, $password, $typeAccount) {
        if (!isset(self::$instance)) {
            self::$instance = new self($numAccount, $userName, $password, $typeAccount);
        }
        return self::$instance;
    }

    public function toString() {
        return "Número de cuenta: " . $this->numAccount . ", " . 
               "Nombre de usuario: " . $this->userName . ", " . 
               "Contraseña: " . $this->password . ", " . 
               "Tipo de cuenta: " . $this->typeAccount . ", " . 
               "Saldo: " . $this->balance;
    }
}

class AccountCurrent extends Account implements workAccount{

    private $balance;

    private  static $instance;

    public function  __construct($numAccount, $userName, $password, $typeAccount){
        parent::__construct($numAccount,$userName,$password, $typeAccount);

        $this->numAccount = $numAccount;
        $this->userName = $userName;
        $this->password = $password;
        $this->typeAccount = $typeAccount;
        $this->balance = 200;
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

    public static function getInstance($numAccount, $userName, $password, $typeAccount) {
        if (!isset(self::$instance)) {
            self::$instance = new self($numAccount, $userName, $password, $typeAccount);
        }
        return self::$instance;
    }

    public function toString() {
        return "Número de cuenta: " . $this->numAccount . ", " . 
               "Nombre de usuario: " . $this->userName . ", " . 
               "Contraseña: " . $this->password . ", " . 
               "Tipo de cuenta: " . $this->typeAccount . ", " . 
               "Saldo: " . $this->balance;
    }

}

function __Register() 
{
        $paginaAnterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconocido";

    if (strpos($paginaAnterior, "register.php") !== false) {
        echo "Guardando datos de cuenta";

        $numAccount = $_POST["numAccount"];
        $typeAccount = $_POST["typeAccount"];
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        if ($_POST["typeAccount"] == 'Cuenta corriente') {
            $AccountCurrent =  new AccountCurrent(  $numAccount, $userName, $password, $typeAccount);
            header('Location: login.php?numAccount=' . urlencode($AccountCurrent->getNumAccount()) . '&userName=' . urlencode($AccountCurrent->getUserName()) . '&saldo=' . urlencode($AccountCurrent->getBalance()) . '&typeAccount=' . urlencode($AccountCurrent->getTypeAccount()) . '&password=' . urlencode($AccountCurrent->getPassword()));
            exit();
            return $AccountCurrent;
        } else {
            $AccountSaving =  new AccountSaving(  $numAccount,$userName,$password,$typeAccount);
            header('Location: login.php?numAccount=' . urlencode($AccountSaving->getNumAccount()) . '&userName=' . urlencode($AccountSaving->getUserName()) . '&saldo=' . urlencode($AccountSaving->getBalance()) . '&typeAccount=' . urlencode($AccountSaving->getTypeAccount()) . '&password=' . urlencode($AccountSaving->getPassword()));
            exit();
            return $AccountSaving;
        }

    }
}

function __login($AccountState){
    $paginaAnterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconocido";
    if (strpos($paginaAnterior, "login.php") !== false)
    {
        $userNameL = $_POST["userNameL"] ;
        $passwordL = $_POST["passwordL"] ;

        echo $userNameL." ". $passwordL;
        $numAccountO = $_POST["numAccountC"] ;
        $userNameO = $_POST["userNameC"] ;
        $balanceO = $_POST["balanceC"] ;
        $typeAccountO = $_POST["typeAccountC"] ;
        $passwordO = $_POST["passwordC"] ;
        if($userNameL == $userNameO && $passwordL == $passwordO){
            if($typeAccountO == "Cuenta Corriente"){
                $AccountState = new AccountCurrent($numAccountO, $userNameO, $passwordO, $typeAccountO);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountO, $userNameO, $passwordO, $typeAccountO);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        }else{
            if($typeAccountO == "Cuenta Corriente"){
                $AccountState = new AccountCurrent($numAccountO, $userNameO, $passwordO, $typeAccountO);
                header('Location: login.php?alert=incorrecto&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountO, $userNameO, $passwordO, $typeAccountO);
                header('Location: login.php?alert=incorrecto&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }

    }

}
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $AccountSTate = __Register();
    __login($AccountSTate);
}



?>


