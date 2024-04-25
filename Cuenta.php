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
        $this->balance = 0;

    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {

        if(($amount <= $this->balance) && ($this->balance -$amount) >= 0){
            $this->balance -= $amount;
        }
        else{
            return 'alert';
        }

    }

    public function setBalance($balance){
        $this->balance = $balance;
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
        // date('d',$randomDate);
        $day = date('d',$randomDate);
        if($day == 1){
            $this->balance += $this->balance*0.05;
            return 'first';
        }

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
        $this->balance = 0;
    }

    public function deposit($amount)
    {   echo "Cantidad deppo".$amount." ".$this->balance ;
        $this->balance = $this->balance + $amount;  
    }

    public function withdraw($amount)
    {
        $lost = ($amount*4)/1000;
        if(($this->balance - $amount) >= -300000){
            $this->balance = $this->balance - ($amount +$lost);
        }else{
            return  'alert';
        }   
    }
    public function setBalance($balance){
        $this->balance = $balance;
    }

    public function getBalance(){
        return $this->balance;
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

function __superBalance(){
    $paginaAnterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconocido";
    if (strpos($paginaAnterior, "balance.php") !== false){
        if (isset($_POST['deposito'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }

        } elseif (isset($_POST['retiro'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["typeAccountB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } elseif (isset($_POST['consultar_saldo'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                echo $balanceB;
                $AccountState->setBalance($balanceB);
                echo"saldo: ". $AccountState->getBalance();
                echo"uSUARIP". $AccountState->toString();
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } else {
            echo "No se presionó ningún botón.";
        }
    }
    }



function __superDeposit(){
    $paginaAnterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconocido";
    if (strpos($paginaAnterior, "depositar.php") !== false){
        if (isset($_POST['deposito'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta Corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }

        } elseif (isset($_POST['retiro'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["typeAccountB"] ;
            if($typeAccountB == "Cuenta Corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } elseif (isset($_POST['consultar_saldo'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta Corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } elseif(isset($_POST['depositarS'])) {
            echo 'va a depositar';
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            $amount = $_POST["amount"];
            echo "Cantidad: ".$amount;
            echo $typeAccountB;
            if($typeAccountB == "Cuenta corriente"){
                echo "CantidadD".$amount;
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                $AccountState->deposit($amount);
                echo $AccountState->getBalance();
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                $AccountState->deposit($amount);
                $first = $AccountState->Percentage();
                if($first == 'first'){
                    header('Location: balance.php?alert=first&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }else{
                    header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }
               }
         
        }else{
            echo "No se presionó ningún botón.";
        }
    }

}

function __superWithdraw(){
    $paginaAnterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconocido";
    if (strpos($paginaAnterior, "retirar.php") !== false){
        if (isset($_POST['deposito'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                header('Location: depositar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }

        } elseif (isset($_POST['retiro'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["typeAccountB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 

            }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                header('Location: retirar.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } elseif (isset($_POST['consultar_saldo'])) {
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
           }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                exit(); 
               }
        } elseif(isset($_POST['retirarS'])){
            $numAccountB = $_POST["numAccountB"] ;
            $userNameB = $_POST["userNameB"] ;
            $balanceB = $_POST["balanceB"] ;
            $amount = $_POST['amount'];
            $typeAccountB = $_POST["typeAccountB"] ;
            $passwordB = $_POST["passwordB"] ;
            if($typeAccountB == "Cuenta corriente"){
                $AccountState = new AccountCurrent($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                $alert =$AccountState->withdraw($amount);
                if($alert = 'alert'){
                    header('Location: balance.php?alert=incorrecto&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 

                }else{
                    header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }
           
           }else{
                $AccountState = new AccountSaving($numAccountB, $userNameB, $passwordB, $typeAccountB);
                $AccountState->setBalance($balanceB);
                $alert = $AccountState->withdraw($amount);
                $first = $AccountState->Percentage();
                if($alert == 'alert'){
                    header('Location: balance.php?alert=saldo&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }else{
                    header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }
                if($first == 'first'){
                    header('Location: balance.php?alert=first&numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }else{
                    header('Location: balance.php?numAccount=' . urlencode($AccountState->getNumAccount()) . '&userName=' . urlencode($AccountState->getUserName()) . '&saldo=' . urlencode($AccountState->getBalance()) . '&typeAccount=' . urlencode($AccountState->getTypeAccount()) . '&password=' . urlencode($AccountState->getPassword()));
                    exit(); 
                }
             
               }

        } else{
            echo "No se presionó ningún botón.";
        }
    }


}



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $AccountSTate = __Register();
    __login($AccountSTate);
    __superBalance();
    __superDeposit();
    __superWithdraw();
}

?>


