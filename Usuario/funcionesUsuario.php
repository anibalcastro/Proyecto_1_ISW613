<?php

/***
 * Contains id user
 */
$idUser = 0;

/**
 * Connection to database
 */
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
function getIdCategories($nombre)
{
    $categorias = getCategories();
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
function getAllNewByIdUser($id)
{
}

/**
 * Get news by Categories
 */
function getNewByCategories($categories, $id)
{
}

function createSource($url, $name, $cateogoryId){
    //url/name/category_id/user_id 
    $idUser = getIdUsuario();
}

/**
 * Get id of the source
 */
function getIdSourceNews($source){

}

function createNews($title, $shortDescription, $linkNew, $date, $source, $category){
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id 

    $idSource = getIdSourceNews($source);
    $idCategory = getIdCategories($category);
    $idUser = getIdUsuario();

    $sqlInsert = "INSERT INTO `news`(`title`,`short_description`,`perman_link`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$title','$shortDescription','$linkNew','$date',$idSource,$idUser,$idCategory);";

    echo $sqlInsert;
    die;
}


?>