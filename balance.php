<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    <title>Saldo</title>
</head>
<body class="body_balance">
<form class="form_account" action="Cuenta.php" method="post">
         <input type="hidden" name="numAccountB" value="<?php echo htmlspecialchars($_GET['numAccount']); ?>">
          <input type="hidden" name="userNameB" value="<?php echo htmlspecialchars($_GET['userName']); ?>">
          <input type="hidden" name="balanceB" value="<?php echo htmlspecialchars($_GET['saldo']); ?>">
          <input type="hidden" name="typeAccountB" value="<?php echo htmlspecialchars($_GET['typeAccount']); ?>">
          <input type="hidden" name="passwordB" value="<?php echo htmlspecialchars($_GET['password']); ?>">
    <div class="sidebar">
        <span class="material-symbols-outlined">menu</span>
        <ul class="sidebar_ul">
        <li class="sidebar_ul_balance"><button class="sidebar_button" type="submit" name="deposito">Depósito</button></li>
        <li class="sidebar_ul_balance"><button class="sidebar_button"type="submit" name="retiro">Retiro</button></li>
        <li class="sidebar_ul_balance"><button class="sidebar_button" type="submit" name="consultar_saldo">Consultar Saldo</button></li>
        </ul>
    </div>
    <div class="Account">
        <section class="Account_info">
            <h1 class="info_title">Información de cuenta</h1>
            <fieldset class="Account_info_user">
                <table class="Account_info_user_table">
                    <tr>
                        <td>Número de cuenta: </td>
                        <td><?php echo htmlspecialchars($_GET['numAccount']); ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de usuario: </td>
                        <td><?php echo htmlspecialchars($_GET['userName']); ?></td>
                    </tr>
                </table>
            </fieldset>
        </section>
        <section class="balance_account">
            <h1 class="info_title">Saldo</h1>
            <?php 
            if(isset($_GET['typeAccount'])){
                $type_Account = $_GET['typeAccount'];
                if($type_Account == 'Cuenta corriente') {
                    echo '
<fieldset class="balance_account_user">
    <legend>Cuenta Ahorro</legend>
    <table class="balance_account_user_table">
        <tr>
            <td>Total: </td>
            <td>No tiene cuenta de ahorros</td>
        </tr>
    </table>
</fieldset>
<fieldset class="balance_account_user">
    <legend>Cuenta Corriente</legend>
    <table class="balance_account_user_table">
        <tr>
            <td>Total: </td>
            <td>' . htmlspecialchars($_GET['saldo']) . '</td>
        </tr>
    </table>
</fieldset>';
                } else {
                    echo '
<fieldset class="balance_account_user">
    <legend>Cuenta Ahorro</legend>
    <table class="balance_account_user_table">
        <tr>
            <td>Total: </td>
            <td>' . htmlspecialchars($_GET['saldo']) . '</td>
        </tr>
    </table>
</fieldset>
<fieldset class="balance_account_user">
    <legend>Cuenta Corriente</legend>
    <table class="balance_account_user_table">
        <tr>
            <td>Total: </td>
            <td>No tiene cuenta corriente</td>
        </tr>
    </table>
</fieldset>';
                }
 }  
            ?>
        </section>
           <?php
        if (isset($_GET['alert']) && $_GET['alert'] === 'incorrecto') {
            echo '<div style="color: red; margin-bottom: 10px; font-weight: bold;" class="alert">Usted excedio su saldo, tendra un sobregiro aproximado de $ -300,000</div>';
          }
          ?> 
        <?php
        if (isset($_GET['alert']) && $_GET['alert'] === 'saldo') {
            echo '<div style="color: red; margin-bottom: 10px; font-weight: bold;" class="alert">Su retiro no puede ser mayor a su saldo o dejar saldo negativo</div>';
          }
          ?> 
          <?php
           if (isset($_GET['alert']) && $_GET['alert'] === 'first') {
            echo '<div style="color: green; margin-bottom: 10px; font-weight: bold;" class="alert">Aumento por primer día del mes</div>';
          }
          ?> 
          
    </div>
</form>
</body>
</html>
