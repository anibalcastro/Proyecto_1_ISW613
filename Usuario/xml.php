<?php
include ('funcionesUsuario.php');

//url = http://feeds.feedburner.com/crhoy/wSjk?format=xml


if (isset($_POST['btnSave']))
{
    if (!empty($_POST['url']) && !empty($_POST['nameSource']) && !empty($_POST['optCategory']))
    {
        $idUser = $_POST['idUser'];
        $url = $_POST['url'];
        $nameSource = $_POST['nameSource'];
        $categoria = $_POST['optCategory'];
    }
    else {
        header ('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=Error-Fill-the-blanks');
    }
}

$invalidurl = false;
if (@simplexml_load_file($url))
{
    $feeds = simplexml_load_file($url);
}
else
{
    $invalidurl = true;
    echo "<h2>Invalid RSS feed URL.</h2>";
}

$i = 0;
if (!empty($feeds))
{
    //Nombre del sitio
    $site = $feeds->channel->title;
    //Link del sitio
    $sitelink = $feeds->channel->link;
    $idCategoria = getIdCategories($categoria);
    $resultadoExiste = existsSource($nameSource, $idCategoria, $idUser);

    if (!$resultadoExiste){
        createSource($sitelink, $nameSource, $idCategoria, $idUser);
        $idSource = getIdSoruceNews($nameSource, $idCategoria, $idUser);
        $iterador = 0;
    
        foreach ($feeds->channel->item as $item)
        {
            $xmlTitle = $item->title;
            $xmlLink = $item->link;
            $xmlDescription = $item->description;
            $xmlPubDate = $item->pubDate;
            $xmlCategoria = $item->category;
    
            if ($categoria == $xmlCategoria)
            {
                $date = date_create("$xmlPubDate");
                $dateTime = date_format($date, "Y/m/d H:i:s");
    
                $result = createNews($xmlTitle, $xmlDescription, $xmlLink, $dateTime, $idSource, $idCategoria, $idUser);
                if ($result)
                {
                    $iterador += 1;
                }
                /*
                echo "Titulo: ". $xmlTitle.PHP_EOL;
                echo "Link:".$xmlLink.PHP_EOL;
                echo "Descripcion:".$xmlDescription.PHP_EOL;
                echo "Publicacion:".$xmlPubDate.PHP_EOL;
                echo "Categoria:".$xmlCategoria.PHP_EOL;
                echo "".PHP_EOL;
                echo "".PHP_EOL;
                echo "".PHP_EOL;
                */
            }
        }
    
        if ($iterador > 0)
        {
            header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php');
        }
        else
        {
            header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=no_hay');
        }
    }
    else {
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/ceFuentes.php?status=success&message=existe');
    }
}

