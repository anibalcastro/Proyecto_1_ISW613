<?php 

$url = "http://feeds.feedburner.com/crhoy/wSjk?format=xml";

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

 foreach ($feeds->channel->item as $item) {

  $title = $item->title;
  $link = $item->link;
  $description = $item->description;
  $pubDate = $item->pubDate;
  $categoria = $item->category;


  echo "Titulo: ". $title.PHP_EOL;
  echo "Link:".$link.PHP_EOL;
  echo "Descripcion:".$description.PHP_EOL;
  echo "Publicacion:".$pubDate.PHP_EOL;
  echo "Categoria:".$categoria.PHP_EOL;
  echo "".PHP_EOL;
  echo "".PHP_EOL;
  echo "".PHP_EOL;
 }
}