<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti



if($_SESSION['id_gruppi']!=1)
{
     header('Location:messaggio.php?idmess=4');
}

if(isset($_GET['activechange']))
{   
    if($_GET['activechange']==1){
    $query=("UPDATE `musicstore`.`utenti` 
    SET `isactive`='0' WHERE `idutenti`=".$_GET['idutenti'].";");
    upData($query);
}else{
    $query=("UPDATE `musicstore`.`utenti` 
    SET `isactive`='1' WHERE `idutenti`=".$_GET['idutenti'].";");
    upData($query);
}

}

if(isset($_GET['groupchange']))
{   
    if($_GET['groupchange']==1){
    $query=("UPDATE `musicstore`.`utenti` 
    SET `idgruppi`='2' WHERE `idutenti`=".$_GET['idutenti'].";");
    upData($query);
}else{
    $query=("UPDATE `musicstore`.`utenti` 
    SET `idgruppi`='1' WHERE `idutenti`=".$_GET['idutenti'].";");
    upData($query);
}

}

if(isset($_GET['remove']))
{   
    if($_GET['remove']==1){
    $query=("DELETE FROM `musicstore`.`utenti` WHERE `idutenti`=".$_GET['idutenti']."");
    upData($query);
}

}



$main = new Skin("musicstore");

$main = new Skinlet("gestioneutenti");



//header diviso in 2
$header = new Skinlet("header");

$query=("SELECT * FROM utenti");
$utenti=getResult($query);


$main->setContent("utenti", $utenti);

$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());




$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();


?>