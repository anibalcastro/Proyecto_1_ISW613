<?php
  session_start();
  $user = $_SESSION['user'];

  if(!$user or $user['role_id']!= 1 ){
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
  }

  $nombreUsuario = $user['first_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoria</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php echo '<link href="categorias.css" type="text/css" rel="stylesheet" >'; ?>
</head>
<body>
    <!-- Encabezado -->
    <header id="encabezado">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <div class="header">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
                id="logo_empresa" alt="icon" srcset="logo icon">
        </a>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-dark" disabled="disabled">admin - <?php echo $nombreUsuario ?></button>
            <button type="button" class="btn btn-dark">Categories</button>
            <button type="button" class="btn btn-dark">Log out</button>
        </div>
        </div>

        </nav>
    </header>

    <!-- Titulo -->
    <div class="jumbotron">
        <h1 class="display-4">Agregar Categories</h1>
        <div class="linea_100"></div>
    </div>

    <!-- Cuerpo -->
    <div>
        <form action="" method="post">
            <input name="nameCategory" type="text" class="form-control" placeholder="Cateogry Name">
            <div class="linea_100"></div>
            <input id="btnSave" type="submit" name="btnSave" value="Save" class="btn btn-dark">
        </form>
    </div>

     <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
    <section class="submenu">
      <nav class="nav">
        <a id="item" class="nav-link active" href="#">My Cover</a>
        <a id="item" class="nav-link disabled" href="#">|</a>
        <a id="item" class="nav-link" href="#">About</a>
        <a id="item" class="nav-link disabled" href="#">|</a>
        <a id="item" class="nav-link" href="#">Help</a>
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
</body>



</body>
</html>