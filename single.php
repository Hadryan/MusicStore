<?php


require "include/template2.inc.php";// motore template
require "include/dbms.inc.php"; //connessione al db
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; // libreria gestione sessioni

$main = new Skin("musicstore");

$main = new Skinlet("single");
$player = new Skinlet("player");
//header diviso in 2
$header = new Skinlet("header");

if(isset($_GET['addsuccess']))
{
 $main->setContent('msg',"Elemento aggiunto nel carrello");   
}

$idprodotto=$_GET['idprod'];
$result=getproductbyid($idprodotto);
//print_r($result);
$main->setContent('albumtitle',$result[0]['nomeprodotto']);
$main->setContent('getalbumautor',$result[0]['nomeautore']);
$main->setContent('albumimg',$result[0]['urlimgprodotti']);
$main->setContent('imgalt',$result[0]['altimmprodotti']);
$main->setContent('albumgenere',$result[0]['nomegeneri']);
$main->setContent('albumproductor',$result[0]['nomeproduttori']);
$main->setContent('albumcategories',$result[0]['nomecategorie']);
$main->setContent('albumformat',$result[0]['nomecategorie']);
$main->setContent('albumuscita',$result[0]['datains']);
$main->setContent('videourl',$result[0]['videourl']);
$main->setContent('idproduct',$_GET['idprod']);
$main->setContent('idautore',$result[0]['idautori']);
$main->setContent('prezzo',$result[0]['prezzo']);

//player delle tracce
$result=gettraksbyid($idprodotto);
//print_r($result);
$m=count($result);
for($i=0;$i<$m;$i++){
$player=new Skinlet("player");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="albumtraks";
$stringa.=$i;
$player->setContent("sampleurl",$result[$i]['urltraccia']);
$player->setContent("durata",$result[$i]['durata']);
$player->setContent("nometraccia",$result[$i]['titolo']);
$main->setContent($stringa,$player->get());
$stringa="";
}





$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>