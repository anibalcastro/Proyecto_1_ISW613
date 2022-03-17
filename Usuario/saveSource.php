<?php
include ('funcionesUsuario.php');


if (isset($_POST['btnSave']))
{
    if (!empty($_POST['url']) && !empty($_POST['nameSource']) && !empty($_POST['optCategory']))
    {
        $idUser = $_POST['idUser'];
        $url = $_POST['url'];
        $nameSource = $_POST['nameSource'];
        $categoria = $_POST['optCategory'];
        $action = $_POST['action'];

        if ($action == 'Agregar'){
            $idCategoria = getIdCategories($categoria);
            $resultadoExiste =  existsSource($nameSource, $idCategoria, $idUser);

            if (!$resultadoExiste){
                createSource($url, $nameSource, $idCategoria, $idUser);
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php');
            }
            else {
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=existe');
            }
        }
        else 
        {

        }
    }
    else {
        header ('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=Error-Fill-the-blanks');
    }
}



