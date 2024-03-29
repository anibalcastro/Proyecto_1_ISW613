<?php
$idSource = 0;
$idCategory = 0;

/********************************************************************* */
//CONEXION

/**
 * Connection to database
 */
function conexion()
{
    return mysqli_connect('127.0.0.1','root','','mynews');
}
/********************************************************************* */
///CATEGORIES

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
function getIdCategories($nameCategory)
{
    $connection = conexion();

    $sql = "SELECT `id` FROM `categories` WHERE `name` = '$nameCategory';";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    $identificador = $result->fetch_array(MYSQLI_NUM);
    
    return $identificador[0];
}


/********************************************************************* */
//NEWS


/**
 * Get news by Categories
 */
function getNewByCategories($idCategory, $id)
{
    $connection = conexion();

    $sql = "SELECT title, short_description, perman_link, fecha, news_source.name, categories.name FROM `news` INNER JOIN news_source ON news.news_source_id = news_source.id INNER JOIN categories ON news.category_id = categories.id AND news.user_id = $id AND news.category_id = $idCategory ORDER BY fecha DESC;";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    return $result->fetch_all();
}

/**
 * Get all news by Id User
 */
function getAllNewByIdUser($id)
{
    $connection = conexion();

    $sql = "SELECT title, short_description, perman_link, fecha, news_source.name, categories.name FROM `news` INNER JOIN news_source ON news.news_source_id = news_source.id INNER JOIN categories ON news.category_id = categories.id AND news.user_id = $id ORDER BY fecha DESC;";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    return $result->fetch_all();
}

/**
 * Function create news
 */
function createNews($title, $shortDescription, $linkNew, $date, $source, $category, $idUser)
{
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id 
    $connection = conexion();

    $sqlInsert = "INSERT INTO `news`(`title`,`short_description`,`perman_link`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$title','$shortDescription','$linkNew','$date',$source,$idUser,$category);";

    $result =  mysqli_query($connection, $sqlInsert);
    

    return $result;
}

/**
 * Function delete news
 */
function deleteNews($idSource, $idUser)
{
    //Elimina las noticias
    $sqlDeleteNews = "DELETE FROM `news` WHERE `news_source_id` = $idSource and user_id = $idUser;";
    $connection = conexion();
    mysqli_query($connection, $sqlDeleteNews);
    mysqli_close($connection);
}


/********************************************************************* */
///SOURCE 

/**
 * Valida si existe la fuente.
 */
function existsSource($source, $categoria, $idUser)
{
    $connection = conexion();
    $boolean = false;
    $sql = "SELECT `id` FROM `news_source` WHERE `name` = '$source' and `category_id` = $categoria and `user_id` = $idUser;";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    $id = $result->fetch_array(MYSQLI_NUM);

    if(!empty($id[0])){
        $boolean = true;
    }

    return $boolean;
}

/**
 * Obtiene el identificador
 * de las fuentes.
 */
function getIdSoruceNews($source, $categoria, $idUser)
{
    $connection = conexion();
    $sql = "SELECT `id` FROM `news_source` WHERE `name` = '$source' and `category_id` = $categoria and `user_id` = $idUser;";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    $identificador = $result->fetch_array(MYSQLI_NUM);
 
    return $identificador[0];
}

/**
 * Agrega a la base de datos fuentes
 */
function createSource($url, $name, $cateogoryId, $idUser)
{
    //url/name/category_id/user_id 
    $connection = conexion();

    $sqlCreateSource = "INSERT INTO `news_source`(`url`, `name`, `category_id`, `user_id`) VALUES ('$url','$name',$cateogoryId, $idUser);";

    mysqli_query($connection, $sqlCreateSource);
}

/**
 * Function edit source
 */
function editSource($idSource, $nameSource, $urlSource, $idCategory)
{
    $connection = conexion();

    $sqlEditSource = "UPDATE `news_source` SET `url`='$urlSource',`name`='$nameSource',`category_id`= $idCategory WHERE id = $idSource;";

    mysqli_query($connection, $sqlEditSource);
    mysqli_close($connection);
}

/**
 * Elimina fuentes y las noticias
 * relacionadas al mismo.
 */
function deleteSource($idSource, $idUser )
{
    $connection = conexion();

    //Elimina las noticias
    $sqlDeleteNews = "DELETE FROM `news` WHERE `news_source_id` = $idSource and user_id = $idUser;";
    $sqlDeleteSource = "DELETE FROM `news_source` WHERE `id` = $idSource and user_id = $idUser;";


    mysqli_query($connection, $sqlDeleteNews);
    mysqli_query($connection, $sqlDeleteSource);

    mysqli_close($connection);

}

/**
 * Function get all source by $idUser
 */
function getSource($idUser)
{
    $connection = conexion();
    $sqlGetSource = "SELECT news_source.id, news_source.name, categories.name FROM `news_source` INNER JOIN categories ON categories.id = news_source.category_id AND user_id = $idUser;";
    $resultado = mysqli_query($connection, $sqlGetSource);
    mysqli_close($connection);


    return $resultado->fetch_all();
}

/**
 * Function get specific source
 */
function getInfoSource($idSource, $idUser)
{
    $connection = conexion();
    $sqlGetInfoSource = "SELECT * FROM `news_source` WHERE user_id = $idUser AND id = $idSource;";
    $resultado = mysqli_query($connection, $sqlGetInfoSource);
    mysqli_close($connection);



    return $resultado->fetch_array();
}

?>