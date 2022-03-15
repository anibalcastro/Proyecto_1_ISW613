<?php 
include('funcionesUsuario.php');
$idUser = 2;
$resultado = "";

function setIdUser($id){
    $idUser = $id;
}

if(!empty($_REQUEST['status'])) 
{
    //Viene con categoria especifica
    $idCategoria = $_REQUEST['status'];
    $resultado = getNewByCategories($idCategory, $idUser);
}
else 
{
    //Obtiene todas las noticias
    $resultado = getAllNewByIdUser($idUser);
    var_dump($resultado);
}

function getResultado(){
    return $resultado;
}



?>