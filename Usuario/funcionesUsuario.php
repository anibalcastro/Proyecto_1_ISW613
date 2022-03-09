<?php

function conexion(){
    return mysqli_connect('127.0.0.1','root','','mynews');
}

function obtenerCategorias(){
    
    $connection = conexion();

    $sqlCategorias = "SELECT `id`, `name` FROM `categories`;";

    $result = mysqli_query($connection, $sqlCategorias);
    mysqli_close($connection);

    return $result->fetch_all();
}


?>