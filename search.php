<?php
require "include/template2.inc.php";// motore template
require "include/dbms.inc.php"; //connessione al db
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; // libreria gestione sessioni

$main = new Skin("musicstore");
$main = new Skinlet("search");

//header diviso in 2
$header = new Skinlet("header");



$page=$_GET['page'];
$stringa=$_GET['stringa'];
$pepepepepe=$_GET['stringa'];

$nomegenere="risultati ricerca per: $stringa";

//setta il nome del genere


//gestisce indici di pagine in modo dinamico
if($page>0){$index=(21*$page)+1;}
else {$index=0;}
    
    
    


//riempi 19 scafolder settati in product.html
if(!isset($_GET['order'])){
$result=search($stringa);}
else{
    if($_GET['order']==1){$result=getproductorderbygen();}
}

if(empty($result)){$main->setContent('empty','NON CI SONO ELEMENTI ');}
//print_r($result[0]);
$main->setContent('nomegenere',$nomegenere);
$main->setContent('pagina',$page);
$m=count($result);//quantita elementi nell'array
//echo $m;
$p=$m;
$j=1;
$stringa="";
for($i=$index;$i<$m;$i++){    
$producticon=new Skinlet("producticon");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="producticon";
$stringa.=$j;
$producticon->setContent("urlthumb",$result[$i]['urlthumbprodotti']);
$producticon->setContent("urlproduct",$result[$i]['idprodotti']);
$producticon->setContent("altimg",$result[$i]['altimmprodotti']);
$producticon->setContent("nomeprodotto",$result[$i]['nomeprodotto']);
$producticon->setContent("autore",$result[$i]['nomeautore']);
$main->setContent("$stringa",$producticon->get());
$stringa="";
$j++;
}

//link indici di pagina


$result=bestseller();
$h=count($result);
for($i=0;$i<$h;$i++){
$producticon=new Skinlet("producticon");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="producticonmb";
$stringa.=$i;
$producticon->setContent("urlthumb",$result[$i]['urlthumbprodotti']);
$producticon->setContent("urlproduct",$result[$i]['idprodotti']);
$producticon->setContent("altimg",$result[$i]['altimmprodotti']);
$producticon->setContent("nomeprodotto",$result[$i]['nomeprodotto']);
$producticon->setContent("autore",$result[$i]['nomeautore']);
$main->setContent($stringa,$producticon->get());
$stringa="";
}


//link delle pagine
$l=(int)($p/21);
$link="<p>";
for($i=0;$i<($l+1);$i++)
{
   if($m>21){
   $link.="<a href=search.php?stringa=".$pepepepepe."&page=".$i.">".$i."</a>";
   if($i!=$l)$link.=" - ";
   }
}
$link.="</p>";
$main->setContent('pagine',$link); 


$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");
$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>