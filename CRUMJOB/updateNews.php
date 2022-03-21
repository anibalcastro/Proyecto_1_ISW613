<?php
/**
 * Get connection
 */
function conexion()
{
    return mysqli_connect('127.0.0.1', 'root', '', 'mynews');
}

/**
 * Get all source
 */
function getSource()
{
    $connection = conexion();
    $sqlGetSource = "SELECT * FROM `news_source`;";
    $resultado = mysqli_query($connection, $sqlGetSource);
    mysqli_close($connection);

    return $resultado->fetch_all();
}

/**
 * Get name category
 */
function getNameCategoryById($idCategory)
{
    $sqlGetCategory = "SELECT `name` FROM `categories` WHERE `id` = $idCategory;";
    $connection = conexion();

    $result = mysqli_query($connection, $sqlGetCategory);
    mysqli_close($connection);

    $nameCategory = $result->fetch_array();

    return $nameCategory[0];
}

/**
 * Function validate if news exists
 */
function existsNews($link, $idUser)
{
    $boolean = false;
    $sqlExists = "SELECT `id` FROM `news` WHERE `perman_link` = '$link' AND `user_id` = $idUser;";
    $connection = conexion();

    $result = mysqli_query($connection, $sqlExists);

    $id = $result->fetch_array(MYSQLI_NUM);

    if (!empty($id[0]))
    {
        $boolean = true;
    }

    return $boolean;
}

/**
 * Create news
 */
function createNews($xmlTitle, $xmlDescription, $xmlLink, $dateTime, $idSource, $idCategoria, $idUser)
{
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id
    $connection = conexion();

    $sqlInsert = "INSERT INTO `news`(`title`,`short_description`,`perman_link`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$xmlTitle','$xmlDescription','$xmlLink','$dateTime',$idSource,$idUser,$idCategoria);";

    $result = mysqli_query($connection, $sqlInsert);
    mysqli_close($connection);
}

//Obtain result
$sources = getSource();

foreach ($sources as $source)
{
    //Get id source
    $idSource = $source[0];
    //Get url
    $url = $source[1];
    //Get name category
    $nameCategory = getNameCategoryById($source[3]);
    //Get Id User
    $idUser = $source[4];
    //Get id category
    $idCategory = $source[3];

    $invalidurl = false;
    if (@simplexml_load_file($url))
    {
        $feeds = simplexml_load_file($url);
    }
    else
    {
        $invalidurl = true;
        echo "Invalid RSS feed URL" . PHP_EOL;
    }

    if (!empty($feeds))
    {
        foreach ($feeds
            ->channel->item as $item)
        {
            $xmlTitle = $item->title;
            $xmlLink = $item->link;
            $xmlDescription = $item->description;
            $xmlPubDate = $item->pubDate;
            $xmlCategoria = $item->category;

            if ($nameCategory == $xmlCategoria)
            {
                $date = date_create("$xmlPubDate");
                $dateTime = date_format($date, "Y/m/d H:i:s");

                $existNew = existsNews($xmlLink, $idUser);

                if (!$existNew)
                {
                    createNews($xmlTitle, $xmlDescription, $xmlLink, $dateTime, $idSource, $idCategory, $idUser);
                }
                /*
                echo "Titulo: ". $xmlTitle.PHP_EOL;
                echo "Link:".$xmlLink.PHP_EOL;
                echo "Descripcion:".$xmlDescription.PHP_EOL;
                echo "Publicacion:".$dateTime.PHP_EOL;
                echo "Categoria:".$xmlCategoria.PHP_EOL;
                echo "".PHP_EOL;
                echo "".PHP_EOL;
                echo "".PHP_EOL;
                */
            }

        }
    }

}

echo "Noticias Actualizadas";

