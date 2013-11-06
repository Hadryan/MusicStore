<?php
require "include/template2.inc.php";// motore template
require "include/dbms.inc.php"; //connessione al db
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; // libreria gestione sessioni

$main = new Skin("musicstore");
$main = new Skinlet("productbygenere");

//header diviso in 2
$header = new Skinlet("header");


$idgenere=$_GET['idgen'];
$page=$_GET['page'];

$nomegenere=("SELECT * FROM generimusicali WHERE idgenerimusicali='$idgenere'");
$nomegenere=getResult($nomegenere);
$nomegenere=$nomegenere[0]['nomegeneri'];
//setta il nome del genere


//gestisce indici di pagine in modo dinamico
if($page>0){$index=(21*$page)+1;}
else {$index=0;}
    
    
    


//riempi 19 scafolder settati in product.html
$result=getproductbygenere($idgenere);
if(empty($result)){$main->setContent('empty','NON CI SONO ELEMENTI PER QUESTO GENERE');}
//print_r($result);
$main->setContent('nomegenere',$nomegenere);
$main->setContent('pagina',"Pagina: $page");
$m=count($result);//quantita elementi nell'array
$p=$m;
$j=0;
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
$main->setContent($stringa,$producticon->get());
$stringa="";
$j++;
}

//link indici di pagina


$result=getproductbygenerebestseller($idgenere);
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
$link="";
for($i=0;$i<($l+1);$i++)
{
   if($m>21){
   $link.="<a href=productbygenere.php?idgen=".$idgenere."&page=".$i.">".$i."</a>";
   if($i!=$l)$link.=" - ";
   }
}
$link.="";
$main->setContent('pagine',$link); 


$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");
$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>