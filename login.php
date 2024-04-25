<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Login</title>
  </head>
  <body>
    <form class="enter" action="Cuenta.php" method="post">
      <div class="enter_div">
        <section class="section">
          <h1 class="section_title">Banco HBC.</h1>
          <img class="section_img" src="images/banco1.jpg" alt="Banco HBC" />
        </section>
        <section class="section_user">
          <h2 class="data_user">Usuario</h2>
          <input name="userNameL"class="data_user_input" type="text"   pattern="^[a-zA-Záéíóúüñ]+$" required/>
          <h2 class="data_user">Contraseña</h2>
          <input name="passwordL"class="data_user_input" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,}$" />
          <input type="hidden" name="numAccountC" value="<?php echo isset($_GET['numAccount']) ? htmlspecialchars($_GET['numAccount']) : ''; ?>">
          <input type="hidden" name="userNameC" value="<?php echo isset($_GET['userName']) ? htmlspecialchars($_GET['userName']) : ''; ?>">
          <input type="hidden" name="balanceC" value="<?php echo isset($_GET['saldo']) ? htmlspecialchars($_GET['saldo']) : ''; ?>">
          <input type="hidden" name="typeAccountC" value="<?php echo isset($_GET['typeAccount']) ? htmlspecialchars($_GET['typeAccount']) : ''; ?>">
          <input type="hidden" name="passwordC" value="<?php echo isset($_GET['password']) ? htmlspecialchars($_GET['password']) : ''; ?>">
          <?php
           // Verificar si se ha enviado un mensaje de alerta
          if (isset($_GET['alert']) && $_GET['alert'] === 'incorrecto') {
            echo '<div style="color: red; margin-bottom: 10px; font-weight: bold;" class="alert">Usuario o contraseña incorrectos</div>';
          }
          ?>
         <input  type="submit" value= "Iniciar Sesión" class="data_user_button">
          <h3 class="data_user">
            ¿No tienes una cuenta?<a
              class="section_register"
              src="register.html"
              >Regístrate</a
            >
          </h3>
        </section>
      </div>
    </form>
  </body>
</html>

