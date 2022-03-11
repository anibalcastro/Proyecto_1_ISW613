<?php
/***
 * Contains id user
 */
$idUser = 0;

function conexion(){
    return mysqli_connect('127.0.0.1','root','','mynews');
}

/**
 * Get all categories 
 * id / name
 */
function getCategories()
{
    
    $connection = conexion();

    $sqlCategorias = "SELECT `id`, `name` FROM `categories`;";

    $result = mysqli_query($connection, $sqlCategorias);
    mysqli_close($connection);

    return $result->fetch_all();
}


/**
 * Get id by specific categories.
 */
function getIdCategorias($nombre)
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

/**
 * Set Id User 
 */
function setIdUsuario($usuario)
{
    $User = $usuario;
}

/**
 * Get Id user 
 * Return $id
 */
function getIdUsuario()
{
    return this->$User;
}

/**
 * Get all news by Id User
 */
function getAllNewByIdUser($id){

}

/**
 * Get news by Categories
 */
function getNewByCategories($categories, $id){

}

?>