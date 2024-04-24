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
   <form class="form_account">
    <div class="sidebar">
      <span class="material-symbols-outlined">menu</span>
           <ul class="sidebar_ul">
             <li><a>Depósito</a></li>
             <li><a>Retiro</a></li>
             <li class="sidebar_ul_balance"><a>Consultar Saldo</a></li>
           </ul>
    </div>
      <div class="Account">
         <section class="Account_info">
            <h1>Información de cuenta</h1>
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
            <h1>Saldo</h1>
            <fieldset class="balance_account_user">
              <legend>Cuenta Ahorro</legend>
              <table class="balance_account_user_table">
                <tr>
                  <td>Total: </td>
                  <td><?php echo htmlspecialchars($_GET['saldo']); ?></td>
                </tr>
              </table>
            </fieldset>
            <fieldset class="balance_account_user" >
              <legend>Cuenta Corriente</legend>
              <table>
               <tr>
                 <td>Total: </td>
                 <td><?php echo htmlspecialchars($_GET['saldo']); ?></td>
               </tr>
             </table>
            </fieldset>
         </section>
      </div>
   </form>
  </body>
</html>

<?php
echo htmlspecialchars($_GET['numAccount']); 

echo htmlspecialchars($_GET['numAccount']); 


?>
