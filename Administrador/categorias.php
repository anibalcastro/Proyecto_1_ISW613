<?php
  session_start();
  $user = $_SESSION['user'];

  if(!$user or $user['role_id']!= 1 ){
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
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
        <button type="button" class="btn btn-dark" disabled="disabled">Administrador</button>
        <button type="button" class="btn btn-dark">Categories</button>
        <button type="button" class="btn btn-dark">Log out</button>
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
      <tr>
        <td>Deportes</td>
        <td> <button id="edit" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-pencil-align-left" aria-hidden="true"></span>Edit
          </button> | <button id="delete" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-trash-align-left" aria-hidden="true"></span>Delete
          </button>
        </td>
      </tr>

      <tr>
        <td>Acción</td>
        <td> <button id="edit" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-pencil-align-left" aria-hidden="true"></span>Edit
          </button> | <button id="delete" type="button" class="btn btn-default" aria-label="Left Align">
            <span class="glyphicon glyphicon-trash-align-left" aria-hidden="true"></span>Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="btnAdd">
  <button type="button" class="btn btn-dark">Add New</button>
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