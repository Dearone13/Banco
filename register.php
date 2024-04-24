<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Register</title>
  </head>
  <body>
    <form class="enter" action="Cuenta.php" method ="post">
      <div class="enter_div">
        <section class="section">
          <h1 class="section_title">Banco HBC.</h1>
          <img class="section_img" src="images/banco1.jpg" alt="Banco HBC" />
        </section>
        <section class="section_user">
          <h2>Número de cuenta</h2>
          <input name="numAccount" name="name_account"class="data_user_input" type="text" />
          <h2>Tipo de cuenta.</h2>
          <select name="typeAccount" class="data_user_input">
            <option>Cuenta corriente</option>
            <option>Cuenta de ahorro</option>
          </select>
          <h2>Nombre Usuario</h2>
          <input name="userName" class="data_user_input" type="text" />
          <h2>Contraseña</h2>
          <input name="password" class="data_user_input" type="password" />
          <input  type="submit" value= "Registrar" class="data_user_button">
        </section>
      </div>
    </form>
  </body>
</html>
