<?php
  //Si hay un mensaje de error
  if(!empty($_REQUEST['status'])) {
    //captura el error
    $error = $_REQUEST['message'];

    //lo compara
    if($error == "Error-Fill-the-blanks"){
      //muestra alerta
      echo '<script language="javascript">alert("Por favor llenar los campos");</script>';
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
  <?php echo "<link rel=stylesheet href=registro.css>"; ?>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <title>Registro</title>
</head>


<body>
  <header id="encabezado">
    <nav id="nav" class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="http://utnweb.com/web2/Proyecto_1_ISW613/index.php">
      <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
          id="logo_empresa" alt="icon" srcset="logo icon">
      </a>
      <a id="btn_login" href="http://utnweb.com/web2/Proyecto_1_ISW613/index.php" class="btn btn-success btn btn-dark my-2 my-sm-0">Log in</a>

      <!------ 
      <a id="btn_login" class="btn btn-dark my-2 my-sm-0" type="submit">Log in</a>---------->
    </nav>
  </header>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img
          src="https://static.vecteezy.com/system/resources/previews/002/318/271/non_2x/user-profile-icon-free-vector.jpg"
          id="icon" alt="User Icon" />
        <h1>User Registration</h1>
        <div class="linea_100"></div>
      </div>

      <!-- Login Form -->
      <form action="lo_registro.php" method="POST">
        <input type="text" id="nameUser" class="fadeIn first" name="nameU" placeholder="First Name" required="true">
        <input type="text" id="lastUser" class="fadeIn first" name="lastU" placeholder="LastName" required="true">
        <input type="text" id="emailUser" class="fadeIn third" name="emailU" placeholder="Email" required="true">
        <input type="password" id="passwordUser" class="fadeIn fourth" name="passwordU" placeholder="Password" required="true">
        <input type="text" id="adress1" class="fadeIn second" name="adress1U" placeholder="Adress" required="true">
        <input type="text" id="adress2" class="fadeIn second" name="adress2U" placeholder="Adress 2">
        <select name="countryU" id="country" class="fadeIn second" required="true">
          <option disabled selected>Country</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Panamá">Panamá</option>
        </select>
        <input type="text" id="city" class="fadeIn second" name="cityU" placeholder="City" required="true">
        <input type="text" id="zip" class="fadeIn second" name="zipU" placeholder="Zip/Postal Code" required="true">
        <input type="text" id="phone" class="fadeIn second" name="phoneU" placeholder="Phone Number" required="true">

        <input type="submit" class="fadeIn fourth" value="Sign up">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="http://utnweb.com/web2/Proyecto_1_ISW613/index.php">I have user</a>
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