<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; 

//print_r($_POST);
if(!isset($_SESSION['idsession']))
{
    //utente non loggato carrello provvisorio da salvare in caso di login
    //echo "non loggato";
    if(!isset($_SESSION['carrello'])){
    $_SESSION['itemcarrello']=0;   
       //echo "inizializzo il carrello";
    }
    
    if($_POST['discografia']==1){
         // inserisci nel carrello tutti i prodotti nel negozio
         // di quel autore
        $result=getproductbyautore($_POST['idautore']);             
        foreach($result as $k => $v){
    $index=$_SESSION['itemcarrello'];//elementi del carrello
    $_SESSION['carrello'][$index]['idprodotto']=$v['idprodotti'];
    $result2=getproductbyid($v['idprodotti']);
    if($result2[0]['quantita']<=0 || ($result2[0]['quantita']-$_POST['quantita'])<0){header('Location:messaggio.php?idmess=7');exit;}
    $_SESSION['carrello'][$index]['quantita']=$_POST['quantita'];
    $_SESSION['itemcarrello']++;   
        } 
    }
    
    //aggiungi il singolo prodotto
    else{
    $result=getproductbyid($_POST['idprod']);
   if($result[0]['quantita']<=0 || ($result[0]['quantita']-$_POST['quantita'])<0){header('Location:messaggio.php?idmess=7');exit;}
    $index=$_SESSION['itemcarrello'];//elementi del carrello
    $_SESSION['carrello'][$index]['idprodotto']=$_POST['idprod'];
    $_SESSION['carrello'][$index]['quantita']=$_POST['quantita'];
    $_SESSION['itemcarrello']++; 
    } 
    
   
}

 else {
    //utente loggato 
    if(!isset($_SESSION['carrello'])){ //carrello vuoto
        //inizializza carrello
    $_SESSION['itemcarrello']=0;       
    }

    if($_POST['discografia']==1){
         // inserisci nel carrello tutti i prodotti nel negozio
         // di quel autore
        $result=getproductbyautore($_POST['idautore']);             
        foreach($result as $k => $v){
            
    $index=$_SESSION['itemcarrello'];//elementi del carrello
    $_SESSION['carrello'][$index]['idprodotto']=$v['idprodotti'];
    $result2=getproductbyid($v['idprodotti']);
    if($result2[0]['quantita']<=0 || ($result2[0]['quantita']-$_POST['quantita'])<0){header('Location:messaggio.php?idmess=7');exit;}
    $_SESSION['carrello'][$index]['quantita']=$_POST['quantita'];
    $_SESSION['itemcarrello']++;   
        } 
    }
    
    //aggiungi il singolo prodotto
    else{
    
    $result=getproductbyid($_POST['idprod']);
     if($result[0]['quantita']<=0 || ($result[0]['quantita']-$_POST['quantita'])<0){header('Location:messaggio.php?idmess=7');exit;}
    $index=$_SESSION['itemcarrello'];//elementi del carrello
    $_SESSION['carrello'][$index]['idprodotto']=$_POST['idprod'];
    $_SESSION['carrello'][$index]['quantita']=$_POST['quantita'];
    $_SESSION['itemcarrello']++; 
    } 
    
    
 }

//echo "</br> </br>  CARRELLO </br> </br> ";
//print_r($_SESSION['carrello']);
//unset($_SESSION['carrello']);
 $idprod=$_POST['idprod'];
 header("Refresh:0; url=single.php?idprod=$idprod&addsuccess=1");       
        
        
?>