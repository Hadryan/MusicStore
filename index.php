<?php


require "include/template2.inc.php";// motore template
require "include/dbms.inc.php"; //connessione al db
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; // libreria gestione sessioni


$main = new Skin("musicstore");

//header diviso in 2
$header = new Skinlet("header");

$header->setContent("headprofilo",$headprofilo->get());



$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");
$trio = new Skinlet("hometrio");
$slidermenu = new Skinlet("slidermenuhome");






//corpo principale
$producticon=new Skinlet("producticon");
$body=new Skinlet("product");


//riempi 19 scafolder settati in product.html
$result=getproductbydate();
$m=count($result);
for($i=0;$i<$m;$i++){
$producticon=new Skinlet("producticon");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="producticon";
$stringa.=$i;
$producticon->setContent("urlthumb",$result[$i]['urlthumbprodotti']);
$producticon->setContent("urlproduct",$result[$i]['idprodotti']);
$producticon->setContent("altimg",$result[$i]['altimmprodotti']);

$newstringa=titlelen($result[$i]['nomeprodotto']);

$producticon->setContent("nomeprodotto",$newstringa);
$producticon->setContent("autore",$result[$i]['nomeautore']);
$body->setContent($stringa,$producticon->get());
$stringa="";
}



$main->setContent("product", $body->get());
$main->setContent("slidermenuhome", $slidermenu->get());
$main->setContent("slider", $slider->get());
$main->setContent("hometrio", $trio->get());
$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>