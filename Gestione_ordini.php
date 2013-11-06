<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti




$main = new Skin("musicstore");

$main = new Skinlet("gestione_ordini");
if(isset($_GET['changestatus']))
{
    if($_GET['changestatus']==1)
    {
       $idord=$_GET['idordine'];
       switchstatusord($idord);
       
    }
}

//header diviso in 2
$header = new Skinlet("header");

$result=getordini();
if(empty($result)){$main->setContent('ordinevuoto',"Nessun ordine memorizzato!");}
else{$main->setContent('getordini',$result);}


$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>