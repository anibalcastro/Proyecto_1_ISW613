<?php

/**
 * Realiza conexión a la base de datos
 */
function conexion()
{
    return mysqli_connect('127.0.0.1', 'root', '', 'mynews');
}

/**
 * Obtiene datos de una categoria especifica
 */
function datosCategoria($id)
{
    $connection = conexion();

    $sqlDatos = "SELECT `name` FROM `categories` WHERE id = $id;";
    $result = mysqli_query($connection, $sqlDatos);

    mysqli_close($connection);
    return $result->fetch_all();
}

/**
 * Elimina categorias
 */
function eliminarCategoria(&$id)
{
    $connection = conexion();
    $sqlEliminar = "DELETE FROM `categories` WHERE id = $id";

    mysqli_query($connection, $sqlEliminar);
    mysqli_close($connection);
}

/**
 * Edita categorias
 */
function editarCategoria($id, $name)
{
    $connection = conexion();
    $sqlEditar = "UPDATE `categories` SET `name`='$name' WHERE id = $id;";
    mysqli_query($connection, $sqlEditar);
    mysqli_close($connection);

}

/**
 * Agrega categorias
 */
function agregarCategoria($name)
{   
    $agrega = "no";
    $valido = validarExistenciaCategoria($name);
    echo $valido;

    if($valido == "no")
    {
        $connection = conexion();
        $agrega = "si";
        $sqlAgregar = "INSERT INTO `categories`(`name`) VALUES ('$name');";
        mysqli_query($connection, $sqlAgregar);
        mysqli_close($connection);
    }
    else {
        
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Category-exists');   
    }
    return $agrega;
}

function validarExistenciaCategoria(&$name)
{
    $connection = conexion();
    $sqlValidar = "SELECT * FROM `categories` WHERE name = '$name' ;";
    $existe = "no";

    $result = mysqli_query($connection, $sqlValidar);
    mysqli_close($connection);

    if (mysqli_num_rows($result) > 0)
    {
        $existe = "si";
    }

    return $existe;
}

/**
 * Obtiene todas las categorias de la base de datos
 */
function consultarCategorias()
{
    $connection = conexion();

    $sqlCategorias = "SELECT `id`, `name` FROM `categories`;";

    $result = mysqli_query($connection, $sqlCategorias);
    mysqli_close($connection);

    return $result->fetch_all();
}

?>