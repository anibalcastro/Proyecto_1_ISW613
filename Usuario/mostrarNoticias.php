<?php 
include('funcionesUsuario.php');
$idUser = 2;

function setIdUser($id){
    $idUser = $id;
}

if(!empty($_REQUEST['status'])) 
{
    //Viene con categoria especifica
    $idCategoria = $_REQUEST['status'];
}
else 
{
    //Obtiene todas las noticias
    $resultado = getAllNewByIdUser($idUser);
    var_dump($resultado);
}



?>