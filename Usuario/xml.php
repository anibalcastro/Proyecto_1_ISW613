<?php 
include('funcionesUsuario.php');

//url = http://feeds.feedburner.com/crhoy/wSjk?format=xml


if(isset($_POST['btnSave'])){
    if($_POST['url'] != ''){
      $idUser = $_POST['idUser'];
      $url = $_POST['url'];
      $nameSource = $_POST['nameSource'];
      $categoria = $_POST['optCategory'];
    }
}

$invalidurl = false;
if(@simplexml_load_file($url)){
 $feeds = simplexml_load_file($url);
}else{
 $invalidurl = true;
 echo "<h2>Invalid RSS feed URL.</h2>";
}


$i=0;
if(!empty($feeds))
{
 //Nombre del sitio
 $site = $feeds->channel->title;
 //Link del sitio 
 $sitelink = $feeds->channel->link;
 $idCategoria = getIdCategories($categoria);
 createSource($sitelink,$nameSource,$idCategoria, $idUser);
 $idSource = getIdSourceNews($source, $categoria, $idUser);


    foreach ($feeds->channel->item as $item) {

        $xmlTitle = $item->title;
        $xmlLink = $item->link;
        $xmlDescription = $item->description;
        $xmlPubDate = $item->pubDate;
        $xmlCategoria = $item->category;

        if ($categoria == $xmlCategoria){

            createNews($xmlTitle, $xmlDescription, $xmlLink, $xmlPubDate, $site, $idCategoria, $idUser);
            echo "Titulo: ". $xmlTitle ."<br>";
            echo "Link:".$xmlLink."<br>";
            echo "Descripcion:".$xmlDescription."<br>";
            echo "Publicacion:".$xmlPubDate."<br>";
            echo "Categoria:".$xmlCategoria."<br>";
            echo "<br>";
           


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
}    