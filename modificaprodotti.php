<?php

require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

$id_prod=$_GET['idprod'];
$result=getResult("SELECT * FROM prodotti WHERE idprodotti='$id_prod'");
$idcategorie=$result[0]['idcategorie'];
$idautori=$result[0]['idautori'];
$idproduttori=$result[0]['idproduttori'];
$idimmprodotti=$result[0]['idimmprodotti'];
$idgeneri=$result[0]['idgeneri'];
$nomeprodotto=$result[0]['nomeprodotto'];
$prezzo=$result[0]['prezzo'];
$quantita=$result[0]['quantita'];
$venduti=$result[0]['venduti'];
$videourl=$result[0]['videourl'];

$main = new Skin("musicstore");

$main = new Skinlet("modificaprodotti");

//header diviso in 2
$header = new Skinlet("header");




$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());


$main->setContent("idprodotto", $id_prod);
$main->setContent("idcategorie", $idcategorie);
$main->setContent("nomeprod", $nomeprodotto);
$main->setContent("prezzo", $prezzo);
$main->setContent("quantita", $quantita);
$main->setContent("venduti", $venduti);
$main->setContent("videourl", $videourl);
$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>
