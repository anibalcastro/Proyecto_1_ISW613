<?php 

include('funcionesAdmin.php');

if(!empty($_POST['idCategory'])){
    //editar
    $idEditar = $_REQUEST['idCategory'];
    $name = $_REQUEST['nameCategory'];

    editarCategoria($idEditar, $name);

    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Category-was-modified');
}
else {
    //Añadir uno nuevo
    $name = $_REQUEST['nameCategory'];
   
    agregarCategoria($name);
    header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Category-was-added');
}

?>