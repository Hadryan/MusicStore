<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni

$main = new Skin("musicstore");

$main = new Skinlet("messaggio");

//header diviso in 2
$header = new Skinlet("header");

//dall'idmess cambia il messaggio nella pagina
if(isset($_GET['idmess']))
{
    if($_GET['idmess']==0) //registrazione utente
    {
        $msg="Registrazione avvenuta con successo. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
     if($_GET['idmess']==1) //login utente
    {
        if($_GET['loginsuccess']==1){ 
        $msg="Login avvenuto con successo. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
        }
        if($_GET['loginsuccess']==0)
        {
        $msg="Username o Password non corretti! Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect            
        }
        if($_GET['loginsuccess']==2)
        {
        $msg="L'utente e' stato bloccato dall'ammninistratore! Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect            
        }
        
     }
     
     if($_GET['idmess']==2) //registrazione utente
    {
        $msg="Logout avvenuto con successo. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
      if($_GET['idmess']==3) //ordine inviato con successo
    {
        $msg="Ordine avvenuto con successo. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
      if($_GET['idmess']==4) //ordine inviato con successo
    {
        $msg="NON POSSIEDI IL PERMESSO PER ACCEDERE A QUESTA PAGINA. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
       if($_GET['idmess']==5) //ordine inviato con successo
    {
        $msg="I Tuoi dati sono stati aggiornati. Stai per essere reindirizzato tra...";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
       if($_GET['idmess']==6) //ordine inviato con successo
    {
        $msg="Complimenti! L'operazione &egrave; andata a buon fine!!";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
     if($_GET['idmess']==7) //ordine inviato con successo
    {
        $msg="Prodotto non disponibile! prosegui con altri acquisti!";
        $redirectparam[0]=5; // tempo redirect
        $redirectparam[1]='index.php'; // url redirect
     }
     
}

$main->setContent("messaggio",$msg);
$main->setContent("redirect",$redirectparam);

$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>