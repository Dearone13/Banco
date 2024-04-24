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
          <input class="data_user_input" type="text" />
          <h2 class="data_user">Contraseña</h2>
          <input class="data_user_input" type="password" />
          <button class="data_user_button">Iniciar sesión</button>
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
