<?php
include ('funcionesAdmin.php');

if (!empty($_REQUEST['status']))
{
    //captura el id
    $id = $_REQUEST['message'];
    //Eliminar categoria
    $resultado = eliminarCategoria($id);
    if($resultado){
        //Redirecciona
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Category-was-deleted');
    }
    else {
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Error');
    }
    
}

?>