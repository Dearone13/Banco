<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    <title>Retirar</title>
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
    <div class="div_money">
      <h1 class="div_money_title">Retiro</h1>
      <table class="div_money_table2">
        <tr class="div_money_table2_tr">
          <td>Número de cuenta: </td>
          <td></td>
        </tr>
        <tr class="div_money_table2_tr_clear">
          <td class="div_money_table2_td">Nombre de usuario: </td>
          <td class="div_money_table2_td"></td>
        </tr>
        <tr class="div_money_table2_tr">
          <td>Tipo de cuenta: </td>
          <td><select class="div_money_table2_tr_select">
            <option>Cuenta Corriente</option>
            <option>Cuenta de ahorro</option>
          </select></td>
        </tr>
      </table>
      <section class="section_value"> 
        <select class="section_value_move">
          <option value="" selected>Retirar +</option>
          <option>$10.000</option>
          <option>$100.000</option>
          <option>$300.000</option>
          <option>$500.000</option>
          <option>$1.000.000</option>
          <option>$1.500.000</option>
        </select>
        <button class="section_value_move">Cancelar</button>
      </section>
     
    </div>
   </form>
  </body>
</html>
