<?php

require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni


$main = new Skin("musicstore");

$main = new Skinlet("formregistrazione");

//header diviso in 2
$header = new Skinlet("header");

$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());


// se l'immagine è stata caricata manda l'url alla form per il caricamento
// su database
//***********************************************//
if(isset($_SESSION['imgurl']))
{
   if(isset($_SESSION['msgerror']))
   {
       //in caso di errore stampa il messaggio e imposta l'immagine di default
       if(strcmp($_SESSION['msgerror'],"Immagine caricata con successo!")==0){
       $main->setContent("okimg",$_SESSION['msgerror']);
        $imgurl.='"'; 
        //inserisci nel campo hidden della form di registrazione
   // l'url dell'immagine del profilo
   $imgurl.=$_SESSION['imgurl'];
   $imgurl.='"'; 
   $main->setContent("imgurl",$imgurl);
   $main->setContent("erroreimg","");
       }
       
       else{
       $main->setContent("erroreimg",$_SESSION['msgerror']);
       $main->setContent("imgurl","img/default.jpg");
   }
   
   }
   
}
else{
    // se non è stata caricata nessuna immagine carica l'immagine di default
    $main->setContent("imgurl","img/default.jpg");
    
}
unset($_SESSION['imgurl']);
unset($_SESSION['msgerror']);
//***********************************************//



$provincie=getResult("SELECT * FROM provincie");
$main->setContent("provincia",$provincie);

$tipostrade=getResult("SELECT * FROM tipostrada");
$main->setContent("tipostrada",$tipostrade);







$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>