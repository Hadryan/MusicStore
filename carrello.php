<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php"; 

//print_r($_SESSION['carrello']);
$main = new Skin("musicstore");

$main = new Skinlet("carrello");

//header diviso in 2
$header = new Skinlet("header");

if(isset($_SESSION['idsession']))
{   
    //mostra il pulsante di acquisto
    $button=new Skinlet("acquista");
    $main->setContent('acquista',$button->get()); 
}
else{
    // mostra login di registrazione
    $button=new Skinlet("reclink");
    $main->setContent('acquista',$button->get());
}


 if(!isset($_SESSION['carrello'])){
    //in caso di carrello vuoto
    $main->setContent("msgcarrellovuoto", "Il carrello e' vuoto!"); 
}

else{
    $m=count($_SESSION['carrello']);
    $prezzototale=0;
    $quanttot=0;
    for($i=0;$i<$m+1;$i++)
    {
      
        $idprod=$_SESSION['carrello'][$i]['idprodotto'];
        $data[$i]=getproductbyid($idprod);
        $quant[$i]=$_SESSION['carrello'][$i]['quantita'];
        $quanttot=$quanttot+$quant[$i];
        //echo $quant[$i];
        //echo $data[$i][0]['prezzo'];
        $prezzototale=$prezzototale+($quant[$i]*$data[$i][0]['prezzo']);
        //echo $prezzototale;
        
    }
    
   $main->setContent("prezzototale",$prezzototale); 
   $main->setContent("quantitatotale",$quanttot);
   
    $param[0]=$data;
    $param[1]=$quant;
    //print_r($param[0]);
    //print_r($param[1]);
    $main->setContent("elementcarrello",$param); 
    
}



$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());
$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();
        
        
?>