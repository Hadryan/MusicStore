<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

$main = new Skin("musicstore");

$main = new Skinlet("gestione_gruppi");

//header diviso in 2
$header = new Skinlet("header");

if($_GET['remove']==1)
{
   
    $idgrup=$_GET['idgrup'];
    $query=("DELETE FROM gruppi WHERE idgruppi=$idgrup");
    insData($query);
}

if($_GET['addgroup']==1)
{
    //print_r($_POST);
    $nomegruppo=$_POST['nomegruppo'];
    $query="INSERT INTO gruppi VALUES(
    '',
    '$nomegruppo')";
    insData($query);
}


$allgruppi=getGruppi();
$main->setContent('elementgruppi',$allgruppi);

$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>