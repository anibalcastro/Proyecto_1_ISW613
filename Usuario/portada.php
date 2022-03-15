<?php
include('funcionesUsuario.php');
  session_start();
  $user = $_SESSION['user'];

  if(!$user or $user['role_id']!= 2 ){
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php');
  }

  $nombreUsuario = $user['first_name'];
  $idUsuario = $user['id'];
  $categorias = getCategories();
  $resultado = '';

  //valida si tiene espacios en blanco, haga una alerta.
  if(!empty($_REQUEST['status'])) {
    //captura el idCategoria
    $idCategoria = $_REQUEST['message'];

    if ($idCategoria== "inicio"){
      $resultado = getAllNewByIdUser($idUsuario);
    }
    else {
      $idCategoria = $_REQUEST('status');
      $resultado = getNewByCategories($idCategory, $idUsuario);
    }
  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php echo '<link href="usuario.css" type="text/css" rel="stylesheet" >'; ?>
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
        <button type="button" class="btn btn-dark" disabled="disabled"><?php echo $nombreUsuario ?></button>
        <a type="button" href="http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/fuentes.php" class="btn btn-dark">News Source</a>
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-dark">Log out</button>
        </form>
        
      </div>
      </div>

    </nav>
  </header>

  <div class="jumbotron">
    <h1 class="display-4">Your unique News Cover</h1>
    <div class="linea_100"></div>
    <div id="grupoBtn" class="btn-group flex-wrap" role="group" aria-label="Button group with nested dropdown">
    <a href="<?php echo "http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php?status=success&message=inicio";?>" type="button" type="button" class="btn btn-secondary">Portada</a>
    <?php 
    foreach($categorias as $categoria)
    {
    ?>
      
      <a type="button" class="btn btn-secondary" href="<?php echo "http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php??status=success&message=$categoria[0]"; ?>" value="<?php echo $categoria[0]?>"><?php echo "$categoria[1]"?></a>
    <?php
    }
    ?>    
    <!---
        <button type="button" class="btn btn-secondary">Portada</button>
        <button type="button" class="btn btn-secondary">Sucesos</button>
        <button type="button" class="btn btn-secondary">Deportes</button>1
        <button type="button" class="btn btn-secondary">Nacionales</button>
        <button type="button" class="btn btn-secondary">Internacionales</button>
        <button type="button" class="btn btn-secondary">Espectaculos</button>
      !-->
    </div> 
</div>

<div class="contNoticias">
  <a href="#">
    <H6>15/03/2022 09:20</H6>
    <h1 class="tituloNoticia">LA NOTICIA MAS ABSURDA DEL MUNDO</h1>
    <p class="descripcionNoticia">[(CRHoy.com) Una imagen dice más que mil palabras y las reacciones de Antonela Roccuzzo por los abucheos a Lionel Messi se han vuelto virales en las redes sociales. La esposa del crack argentino teniendo que aguantar los señalamientos al futbolista argentino por la eliminación en la Champions League frente al Real Madrid fueron evidentes. </p>
    <a href="">Ver mas</a>
    <H6>Nacionales / CRHoy</H6>
  </a>
</div>

<div class="contNoticias">
  <a href="#">
    <H6>15/03/2022 09:20</H6>
    <h1 class="tituloNoticia">LA NOTICIA MAS ABSURDA DEL MUNDO</h1>
    <p class="descripcionNoticia">[(CRHoy.com) Una imagen dice más que mil palabras y las reacciones de Antonela Roccuzzo por los abucheos a Lionel Messi se han vuelto virales en las redes sociales. La esposa del crack argentino teniendo que aguantar los señalamientos al futbolista argentino por la eliminación en la Champions League frente al Real Madrid fueron evidentes. </p>
    <a href="">Ver mas</a>
    <H6>Nacionales / CRHoy</H6>
  </a>
</div>



  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: CTA -->
  <section class="submenu">
    <nav class="nav">
      <a  id="item" class="nav-link active" href="#">My Cover</a>
      <a  id="item" class="nav-link disabled" href="#">|</a>
      <a  id="item" class="nav-link" href="#">About</a>
      <a  id="item" class="nav-link disabled" href="#">|</a>
      <a  id="item" class="nav-link" href="#">Help</a>
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