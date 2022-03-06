<?php
  //Si hay un mensaje de error
  if(!empty($_REQUEST['status'])) {
    //captura el error
    $error = $_REQUEST['status'];

    //lo compara
    if($error == "Constraseña-Incorrecta"){
      //muestra alerta
      echo '<script language="javascript">alert("Usuario o contraseña incorrectas");</script>';
    }
  }

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <?php echo "<link rel=stylesheet href=index.css>"; ?>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <title>Login</title>
</head>


<body>
<header id="encabezado">
    <nav id="nav" class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="http://utnweb.com/web2/Proyecto_1_ISW613/index.php">
      <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
          id="logo_empresa" alt="icon" srcset="logo icon">
      </a>
    </nav>
  </header>


  <div class="wrapper fadeInDown">
    <div id="formContent">

      <!-- Icon -->
      <div class="fadeIn second">
        <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/non_2x/user-profile-icon-free-vector.jpg" id="icon" alt="User Icon" />
        <h1>Log in</h1>
      </div>

      <!-- Login Form -->
      <form action="lo_index.php" method="POST">
        <input type="text" id="email" class="fadeIn second" name="emailU" placeholder="Email" required="true">
        <input type="password" id="password" class="fadeIn third" name="passwordU" placeholder="Password" required="true">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="http://utnweb.com/web2/Proyecto_1_ISW613/Registro/registro.php">Create user.</a>
      </div>

    </div>
  </div>

  <!-- Footer -->
<footer class="text-center text-white" style="background-color: #0a4275;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: CTA -->
  <section class="submenu">
    <nav class="nav">
      <a class="nav-link active" href="#">My Cover</a>
      <a class="nav-link disabled" href="#">|</a>
      <a class="nav-link" href="#">About</a>
      <a class="nav-link disabled" href="#">|</a>
      <a class="nav-link" href="#">Help</a>
    </nav>
  </section>
  <!-- Section: CTA -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    ©
    <a class="text-white" href="https://mdbootstrap.com/">N Noticias</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</section>
</div>
</body>


</html>