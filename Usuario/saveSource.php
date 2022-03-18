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
        $idSource = $_POST['idSource'];
        
        $idCategoria = getIdCategories($categoria);

        if ($action == 'Agregar'){
           
            $resultadoExiste =  existsSource($nameSource, $idCategoria, $idUser);

            if (!$resultadoExiste){
                createSource($url, $nameSource, $idCategoria, $idUser);
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/principal.php?status=success&message=inicio";');
            }
            else {
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceSource.php?status=success&message=existe');
            }
        }
        else 
        {
            $infoSource = getInfoSource($idSource, $idUser);
        
            if($infoSource[1] != $url OR $infoSource[3] != $idCategoria){
                //borrar las noticias
                deleteNews($idSource, $idUser);
                //editar la fuente
                editSource($idSource, $nameSource, $url, $idCategoria);
            }
            else{
                //editar la fuente
                editSource($idSource, $nameSource, $url, $idCategoria);
            }
            header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/sources.php');
        }
    }
    else {
        header ('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceSource.php?status=success&message=Error-Fill-the-blanks');
    }
}



