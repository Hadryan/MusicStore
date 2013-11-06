<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/product.inc.php";// libreria gestione prodotti


$main = new Skin("musicstore");

$utenti = new Content($userEntity, $groupEntity);

$main->setContent("body", $utenty->get());



$prova = new Skinlet("gestioneutenti");


$query=("SELECT * FROM utenti");
$utenti=getResult($query);

$count=count($utenti);
$i=0;
while ($i<$count) {
    $main->setContent("id", $utenti[$i]['id']);
    $main->setContent("nome", $utenti[i]['nome']);
}

$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>