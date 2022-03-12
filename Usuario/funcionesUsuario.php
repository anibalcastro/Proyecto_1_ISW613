<?php

/***
 * Contains id user
 */
$idUser = 0;
$idSource = 0;
$idCategory = 0;

/**
 * Connection to database
 */
function conexion(){
    return mysqli_connect('127.0.0.1','root','','mynews');
}

///CATEGORIES
/**
 * Validate exists categories 
 */
function existsCategories($nombre)
{
    $categorias = getCategories();
    $id = 0;
    
    foreach($categorias as $cat){  
        if ($cat[1] == $nombre){
            $id = $cat[0];
            return true;
            break;
        }
    }
    return $id;
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
 * Set cateogories
 */
function setCategories($id)
{
    $idCategory = this->$id;
}

/**
 * Get id by specific categories.
 */
function getIdCategories()
{
    return this->$idCategory;
}

/**
 * Get news by Categories
 */
function getNewByCategories($categories, $id)
{
}

/********************************************************************* */
///USER
/**
 * Set Id User 
 */
function setIdUsuario($usuario)
{
    $idUser = this->$usuario;
}

/**
 * Get Id user 
 * Return $id
 */
function getIdUsuario()
{
    return this->$idUser;
}

/**
 * Get all news by Id User
 */
function getAllNewByIdUser($id)
{
}

/********************************************************************* */
///SOURCE AND NEWS

/**
 * Validate exists source in database.
 */
function existsSource($source){
    $idUserF = getIdUsuario();
    $connection = conexion();
    
    $sql = "SELECT * FROM `news_source` WHERE name = '$source' AND user_id = $idUserF";
    echo $sql;

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    $result -> fetch_all();

    if (mysqli_num_rows($result) > 0){
        return true;
        $id = $result[0];
        setIdSourceNews($id);
        var_dump($result);
        die;

    }
}

/**
 * set id of the source
 */
function setIdSourceNews($source){
    $idSource = this->$idSource;
}

/**
 * Get id of the source
 */
function getIdSoruceNews(){
    return this->$idSoruce;
}

function createSource($url, $name, $cateogoryId){
    //url/name/category_id/user_id 
    $idUserF = getIdUsuario();
}

function createNews($title, $shortDescription, $linkNew, $date, $source, $category){
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id 

    $idSource = getIdSourceNews($source);
    $idCategory = getIdCategories($category);
    $idUserF = getIdUsuario();

    $sqlInsert = "INSERT INTO `news`(`title`,`short_description`,`perman_link`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$title','$shortDescription','$linkNew','$date',$idSource,$idUser,$idCategory);";

    echo $sqlInsert;
    die;
}


?>