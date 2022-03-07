<?php
    if(!empty($_REQUEST['status'])) {
        //captura el id
        $id = $_REQUEST['message'];
    
        $sqlEliminar = "DELETE FROM `categories` WHERE id = $id";

        echo $sqlEliminar;
        die;

        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Category-was-deleted');
     
      }


?>