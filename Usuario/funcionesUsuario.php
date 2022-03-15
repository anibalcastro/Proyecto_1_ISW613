<?php
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

/**
 * Get Id user 
 * Return $id
 */
function getIdUsuario()
{
    return $idUser;
}

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
 * Get id of the source
 */
function getIdSoruceNews($source, $categoria, $idUser){
    $connection = conexion();
    $sql = "SELECT `id` FROM `news_source` WHERE `name` = '$source' and `category_id` = $categoria and `user_id` = $idUser;";

    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    $identificador = $result->fetch_array(MYSQLI_NUM);
 
    return $identificador[0];
}

function createSource($url, $name, $cateogoryId, $idUser){
    //url/name/category_id/user_id 
    $connection = conexion();
    $sqlCreate = "INSERT INTO `news_source`(`url`, `name`, `category_id`, `user_id`) VALUES ('$url','$name',$cateogoryId, $idUser);";
    mysqli_query($connection, $sqlCreate);
}


function createNews($title, $shortDescription, $linkNew, $date, $source, $category, $idUser){
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id 
    $connection = conexion();

    $sqlInsert = "INSERT INTO `news`(`title`,`short_description`,`perman_link`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$title','$shortDescription','$linkNew','$date',$source,$idUser,$category);";

    $result =  mysqli_query($connection, $sqlInsert);
    

    return $result;
}


?>