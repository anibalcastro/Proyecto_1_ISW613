<?php
session_start();
$user = $_SESSION['user'];

if (!$user or $user['role_id'] != 1)
{
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
}

$nombreUsuario = $user['first_name'];

include ('funcionesAdmin.php');

$categorias = consultarCategorias();

function mensaje(){
  if(!empty($_REQUEST['status'])) {
    //captura el error
    $mensaje = $_REQUEST['message'];

    switch($mensaje){
      case "Error":
        echo '<script language="javascript">alert("Error, la categoria no se puede eliminar");</script>';
        break;
      case "Category-was-deleted":
        echo '<script language="javascript">alert("Categoria eliminada");</script>';
        break;
      case "Category-was-modified":
        echo '<script language="javascript">alert("Categoria modificada");</script>';
        break;
      case "Category-was-added":
        echo '<script language="javascript">alert("Categoria agregada");</script>';
        break;
      case "Category-exists":
        echo '<script language="javascript">alert("Error categoria ya existe");</script>';
        break;
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorias</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php echo '<link href="categorias.css" type="text/css" rel="stylesheet" >'; ?>
</head>

<body>
  <header id="encabezado">
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <div class="header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
            id="logo_empresa" alt="icon" srcset="logo icon">
      </a>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-dark" disabled="disabled">admin - <?php echo $nombreUsuario ?></button>
        <a type="button"  href="http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/ceCategoria.php" class="btn btn-dark">Categories</a>
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-dark">Log out</button>
        </form>
        
      </div>
      </div>

    </nav>
  </header>

  <div class="jumbotron">
    <h1 class="display-4">Categories</h1>
    <div class="linea_100"></div>
  </div>

  <table class="table">
    <thead class="table-light">
      <tr>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($categorias as $iterador)
    {
      $nameCategory = $iterador[1];
      $urlEditar = "http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/ceCategoria.php?status=success&message=" . $iterador[0];
      $urlEliminar = "http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/delete.php?status=success&message=" . $iterador[0];

      echo "
        <tr>
        <td> $nameCategory </td>
        <td><a id=\"edit" . "\" href=\"$urlEditar" . "\"  class=\"btn btn-default" . "\" aria-label=\"Left Align" . "\">Edit</a>
        | 
        <a id=\"delete" . "\" href=\"$urlEliminar" . "\"  class=\"btn btn-default" . "\" aria-label=\"Left Align" . "\">Delete</a> </td>
        </tr>
        ";
    }
    ?>

    </tbody>
  </table>

  <div class="btnAdd">
  <a type="button" href="http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/ceCategoria.php" class="btn btn-dark">Add New</a>
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

  <?php
  //JS
  mensaje(); 
  ?>
</body>

</html>