<?php
session_start();

$main = new Skin("musicstore");

if(!isset($_SESSION['idsession']))
{   //menu di login 
    $headprofilo=new Skinlet("headprofilologin");
   
}
else{
// menu profilo utente nella header    
$idutenti=$_SESSION['idutenti'];
$query="SELECT * FROM utenti INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti WHERE utenti.idutenti='$idutenti'";
$result=getResult($query);

//immagine del profilo
foreach($result as $k => $v){           
$_SESSION['urlimg']=$v['urlimgutenti'];
}
$urlimg=$_SESSION['urlimg'];

    
    $headprofilo=new Skinlet("headprofilouser");
    
    $headprofilo->setContent("username",$_SESSION['username']);
    $headprofilo->setContent("urlimgprofilo",$urlimg);
    if($result[0]['idgruppi']==1)
    {
        $adminutenti="<a href='gestioneutenti.php'><span>></span>Gestisci utenti</a>";
        $adminprodotti="<a href='gestione_prodotti.php'><span>></span>Gestisci prodotti</a>";
        $adminordini="<a href='gestione_ordini.php'><span>></span>Gestisci Ordini</a>";
        $admingruppi="<a href='gestione_gruppi.php'><span>></span>Gestisci Gruppi</a>";
        $headprofilo->setContent("adminutenti",$adminutenti);
        $headprofilo->setContent("adminprodotti",$adminprodotti);
        $headprofilo->setContent("adminordini",$adminordini);
        $headprofilo->setContent("admingruppi",$admingruppi);
    }
    
    
    
}







?>