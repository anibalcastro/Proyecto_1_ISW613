<?php
include ('funcionesUsuario.php');
$separador = "/";

if (!empty($_REQUEST['status']))
{
    //captura el id
    $ids = $_REQUEST['message'];
    $resultado = explode($separador, $ids);
    $idSource = $resultado[0];
    $idUser =  $resultado[1];

    //Eliminar categoria
    deleteSource($idSource,$idUser);
    //Redirecciona
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/fuentes.php?status=success&message=Category-was-deleted');

}