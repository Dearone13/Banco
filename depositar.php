<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    <title>Depositar</title>
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
           <li class="sidebar_ul_balance"><button class="sidebar_button" type="submit" name="retiro">Retiro</button></li>
           <li class="sidebar_ul_balance"><button class="sidebar_button" type="submit" name="consultar_saldo">Consultar Saldo</button></li>
           </ul>
    </div>
    <div class="div_money">
      <h1 class="div_money_title">Depósito</h1>
      <table class="div_money_table2">
        <tr class="div_money_table2_tr">
          <td>Número de cuenta: </td>
          <td><?php echo htmlspecialchars($_GET['numAccount']); ?></td>
        </tr>
        <tr  class="div_money_table2_tr_clear">
          <td>Nombre de usuario: </td>
          <td><?php echo htmlspecialchars($_GET['userName']); ?></td>
        </tr>
        <tr  class="div_money_table2_tr">
          <td>Tipo de cuenta: </td>
          <td><?php echo htmlspecialchars($_GET['typeAccount']); ?></td>
        </tr>
        <tr  class="div_money_table2_tr_clear">
          <td>Monto: </td>
          <td>
        <select name="amount" class="section_value_move">
          <option value="" selected>Agregar +</option>
          <option>10000</option>
          <option>100000</option>
          <option>300000</option>
          <option>500000</option>
          <option>1000000</option>
          <option>1500000</option>
        </select></td>
        </tr>
      </table>
      <button class="section_value_move_S" type="submit" name="depositarS">Depositar +<button>
      </section>

    </div>
   </form>
  </body>
</html>

<?php 




?>
