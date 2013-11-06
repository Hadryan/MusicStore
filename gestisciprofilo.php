<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

$main = new Skin("musicstore");

$main = new Skinlet("gestisciprofilo");


$iduser=$_SESSION['idutenti'];
$datiuser=getuserbyid($iduser);
$provnascita=getprovincianascitabyuserid($iduser);
$provspedizione=getprovinciaspedizionebyuserid($iduser);
$provresidenza=getprovinciaresbyuserid($iduser);

$_SESSION['idimm']=$datiuser[0]['idimmutenti'];


/*********************************/

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
   $aux=$_SESSION['imgurl'];
   $imgurl.='"'; 
   $main->setContent("imgurl",$imgurl);
   $main->setContent("erroreimg","");
   $main->setContent("urlimgprofilo",$aux);
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
//unset($_SESSION['imgurl']);
//unset($_SESSION['msgerror']);
//***********************************************//


//selectprovincie withdefault
$provincie=getResult("SELECT * FROM provincie");
$main->setContent("provincia",$provincie);

$datare[0]=$provincie;
$datare[1][0]=$provnascita[0]['idprovincie'];
$datare[1][1]=$provnascita[0]['nomeprovincia'];
$main->setContent("provnascita",$datare);

$datare[0]=$provincie;
$datare[1][0]=$provresidenza[0]['idprovincie'];
$datare[1][1]=$provresidenza[0]['nomeprovincia'];
$main->setContent("provinciares",$datare);

$datare[0]=$provincie;
$datare[1][0]=$provspedizione[0]['idprovincie'];
$datare[1][1]=$provspedizione[0]['nomeprovincia'];
$main->setContent("provinciasped",$datare);

$tipostrade=getResult("SELECT * FROM tipostrada");
$main->setContent("tipostrada",$tipostrade);


/*********************************/










if(!isset($_SESSION['idsession'])){
   header('Location:messaggio.php?idmess=4');
}

//print_r($datiuser);

$main->setContent('urlimgprofilo',$datiuser[0]['urlimgutenti']);

//anagrafica
$main->setContent("nome",$datiuser[0]['nome']);
$main->setContent("cognome",$datiuser[0]['cognome']);
$main->setContent("datanascita",$datiuser[0]['datadinascita']);
$main->setContent("cdf",$datiuser[0]['cdf']);
$main->setContent("comunenascita",$datiuser[0]['comunenascita']);
$main->setContent("provincianascita",$provnascita[0]['nomeprovincia']);
$main->setContent("indirizzoresidenza",$datiuser[0]['indirizzoresidenza']);
$main->setContent("comuneresidenza",$datiuser[0]['comuneresidenza']);
$main->setContent("provinciaresidenza",$provresidenza[0]['nomeprovincia']);
$main->setContent("cellulare",$datiuser[0]['cellulare']);
$main->setContent("telefono",$datiuser[0]['telefono']);

//indirizzo residenza
$main->setContent("indirizzoresidenza",$datiuser[0]['indirizzoresidenza']);
$main->setContent("numerocivicoresidenza",$datiuser[0]['numerocivicoresidenza']);
$main->setContent("capres",$datiuser[0]['capresidenza']);
$main->setContent("comuneresidenza",$datiuser[0]['comuneresidenza']);

//indirizzo spedizione
$main->setContent("indirizzospedizione",$datiuser[0]['indirizzospedizione']);
$main->setContent("numerocivicospedizione",$datiuser[0]['numerocivicospedizione']);
$main->setContent("capspedizione",$datiuser[0]['capspedizione']);
$main->setContent("comunespedizione",$datiuser[0]['cittaspedizione']);
$main->setContent("intspedizione",$datiuser[0]['interno']);

//Profilo
$main->setContent("username",$datiuser[0]['username']);
$main->setContent("email",$datiuser[0]['email']);


//$provres=getprovinciaresbyuserid($iduser);

//header diviso in 2
$header = new Skinlet("header");



$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>