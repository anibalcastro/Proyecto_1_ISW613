<?php

$User = "";

function conexion(){
    return mysqli_connect('127.0.0.1','root','','mynews');
}

function obtenerCategorias()
{
    
    $connection = conexion();

    $sqlCategorias = "SELECT `id`, `name` FROM `categories`;";

    $result = mysqli_query($connection, $sqlCategorias);
    mysqli_close($connection);

    return $result->fetch_all();
}

function obtenerIdCategorias($nombre)
{
    $categorias = obtenerCategorias();
    $id = 0;
    
    foreach($categorias as $cat){
        if ($cat[1] == $nombre){
            $id = $cat[0];
            break;
        }
    }
    return $id;
}

function setUsuario($usuario)
{
    this->$User = $usuario;
}

function getUsuario()
{
    return this->$User;
}

?>