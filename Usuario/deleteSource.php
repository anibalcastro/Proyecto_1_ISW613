<?php
include ('funcionesUsuario.php');

if (!empty($_REQUEST['status']))
{
    //captura el id
    $idSource = $_REQUEST['message'];
    //Eliminar categoria
    deleteSource($idSource);
    //Redirecciona
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/fuentes.php?status=success&message=Category-was-deleted');

}