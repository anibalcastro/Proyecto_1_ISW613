<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <button type="button" class="btn btn-dark" disabled="disabled">Administrador</button>
        <button type="button" class="btn btn-dark">Categories</button>
        <button type="button" class="btn btn-dark">Log out</button>
      </div>
      </div>

    </nav>
  </header>

  <div class="jumbotron">
    <h1 class="display-4">Your unique News Cover</h1>
    <div class="linea_100"></div>
    <div id="grupoBtn" class="btn-group flex-wrap" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-secondary">Portada</button>
        <button type="button" class="btn btn-secondary">Sucesos</button>
        <button type="button" class="btn btn-secondary">Deportes</button>
        <button type="button" class="btn btn-secondary">Nacionales</button>
        <button type="button" class="btn btn-secondary">Internacionales</button>
        <button type="button" class="btn btn-secondary">Espectaculos</button>
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
</body>
</html>