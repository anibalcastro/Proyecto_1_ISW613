<?php
  session_start();
  $user = $_SESSION['user'];

  if(!$user or $user['role_id']!= 2 ){
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
  }

  $nombreUsuario = $user['first_name'];
  $idUsuario = $user['id'];

  include('funcionesUsuario.php');

  $categorias = getCategories();
  $fuentes = getSource($idUsuario);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Sources</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php echo '<link href="usuario.css" type="text/css" rel="stylesheet" >'; ?>
</head>
<body>
  <header id="encabezado">
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php">
        <div class="header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
            id="logo_empresa" alt="icon" srcset="logo icon">
      </a>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-dark" disabled="disabled"><?php echo $nombreUsuario; ?></button>
        <a href="http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php" type="button" class="btn btn-dark" disabled="disabled">News Source</a>
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-dark">Log out</button>
        </form>
      </div>
      </div>

    </nav>
  </header>

  <div class="jumbotron">
    <h1 class="display-4">News Sources</h1>
    <div class="linea_100"></div>
  </div>

  <table class="table">
    <thead class="table-light">
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach($fuentes as $fuente){
          /*
          echo $fuente[0]; Id
          echo $fuente[1]; Nombre
          echo $fuente[2]; Categoria
          */
          $urlEditar = "http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=". $fuente[0];
          $urlEliminar = "http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/deleteSource.php?status=success&message=". $fuente[0]."/".$idUsuario;
        ?>
       <tr>
        <td><?php echo $fuente[1]; ?></td>
        <td><?php echo $fuente[2]; ?></td>
        <td> 
          <a href="<?php echo $urlEditar; ?>" id="edit" type="button" class="btn btn-default" aria-label="Left Align">Edit</a>
           | 
          <a href="<?php echo $urlEliminar; ?>" id="delete" type="button" class="btn btn-default" aria-label="Left Align">Delete</a>
        </td>
      </tr>
      <?php
        }
      ?>
      <!--
      <tr>
        <td>CRHoy</td>
        <td>Deportes</td>
        <td> <button id="edit" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-pencil-align-left" aria-hidden="true"></span>Edit
          </button> | <button id="delete" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-trash-align-left" aria-hidden="true"></span>Delete
          </button>
        </td>
      </tr>
      -->
    </tbody>
  </table>

  <div class="btnAdd">
  <a href="http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php" type="button" class="btn btn-dark">Add New</a>
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
</html>