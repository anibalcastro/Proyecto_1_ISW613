<?php
  session_start();
  $user = $_SESSION['user'];

  if(!$user or $user['role_id']!= 2 ){
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
  }

  //valida si tiene espacios en blanco, haga una alerta.
  if(!empty($_REQUEST['status'])) {
    //captura el error
    $error = $_REQUEST['message'];

    //lo compara
    if($error == "Error-Fill-the-blanks"){
      //muestra alerta
      echo '<script language="javascript">alert("Por favor llenar los campos");</script>';
    }
  }

  //nombre del usuario
  $nombreUsuario = $user['first_name'];
  //Id del usuario
  $idUsuario = $user['id'];

  include('funcionesUsuario.php');
  $categorias = getCategories();

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
    <!-- Encabezado -->
    <header id="encabezado">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <div class="header">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Telefe_Noticias_logo_2_%282018%29.png"
                id="logo_empresa" alt="icon" srcset="logo icon">
        </a>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-dark" disabled="disabled"><?php echo $nombreUsuario; ?></button>
            <button type="button" class="btn btn-dark">Categories</button>
            <button type="button" class="btn btn-dark">Log out</button>
        </div>
        </div>

        </nav>
    </header>

    <!-- Titulo -->
    <div class="jumbotron">
        <h1 class="display-4">News Source</h1>
        <div class="linea_100"></div>
    </div>

    <!-- Cuerpo -->
    <div>
        <form action="xml.php" method="post">
          <input type="hidden" name="idUser" value="<?php echo $idUsuario ?>">
            <input name="nameSource" type="text" class="form-control" placeholder="Name">
            <input id="url" name="url" type="text" class="form-control" placeholder="RSS URL">
            <select name="optCategory" id="category">
                <option disabled selected>Category</option>
                <?php foreach($categorias as $iterador){
                  echo "<option value= $iterador[1]>$iterador[1]</option>";
                }?>
            </select>
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
</html>