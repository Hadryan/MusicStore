<?php

require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni

//funzioni
function produttoreesistente($produttore){
    $query="SELECT idproduttori FROM produttori WHERE nomeproduttori='$produttore'";
    $result=getResult($query);
    $result1=$result[0]['idproduttori'];
    return $result1;
}

function autoreesistente($autore){
    $query="SELECT idautori FROM autori WHERE nomeautore='$autore'";
    $result=getResult($query);
    $result1=$result[0]['idautori'];
    return $result1;
}

$operazione = $_GET['op'];

if($operazione == "cancella"){
    $id_prod=$_GET['idprod'];
    $query="DELETE FROM prodotti WHERE idprodotti='$id_prod'";
    InsData($query);
    header("Location:messaggio.php?idmess=6");
}

if($operazione == "inserisci"){
    
    $imgurl=$_POST['imgurlproduct'];
    $imgthumb=$_POST['imgurlthumb'];
    $idgenere=$_GET['id_genere'];
    
    $tipocategoria=$_POST['tipo'];
    $autore=$_POST['autore'];
    $idtipoautore=$_POST['idtipoautore'];
    $produttore=$_POST['produttore'];
    $nome_prodotto=$_POST['nomeprodotto'];
    $prezzo=$_POST['prezzo'];
    $quantita=$_POST['quantita'];
    $videourl=$_POST['videourl'];
    $url.="<iframe width=\"410\" height=\"390\" src=".$videourl." frameborder=\"0\" allowfullscreen></iframe>";
    $ora=time();
    $datains=date("d M y - H:i", $ora);
    
    //controllo campi
    if($idgenere == "" || $nome_prodotto == "" || $prezzo=="" || $quantita=="" || $videourl==""){
        echo "<h3>ERRORE Ci sono campi vuoti! Tornare indietro e riprovare!</h3>";
        exit();
    }
    //fine controllo campi
    
    $resultprod=produttoreesistente($produttore);
    $resultaut=autoreesistente($autore);
   
    if($resultprod==NULL){
        $queryprod="INSERT INTO produttori VALUES('','$produttore')";
        InsData($queryprod);
    }
    if($resultaut==NULL){
        $queryaut="INSERT INTO autori VALUES('','$idtipoautore','$autore')";
        InsData($queryaut);
    }
    
    $query2="SELECT idautori FROM autori WHERE nomeautore='$autore'";
        $result=getResult($query2);
        $idautore=$result[0]['idautori'];
        
    $query1="SELECT idproduttori FROM produttori WHERE nomeproduttori='$produttore'";
        $result=getResult($query1);
        $idproduttore=$result[0]['idproduttori'];
    
        
    $query="INSERT INTO immprodotti VALUES('','$nome_prodotto','$imgurl','$imgthumb')";
    InsData($query);
    $ultimo_id=mysql_insert_id();
        
    $query="INSERT INTO prodotti VALUES('','$tipocategoria','$idautore','$idproduttore','$ultimo_id','$idgenere','$nome_prodotto','$prezzo','$quantita','$datains','0','$url')";
    InsData($query);
    header("Location:messaggio.php?idmess=6");
    
    unset($_SESSION['imgurlproduct']);
    unset($_SESSION['msgerror']);
    unset($_SESSION['imgurlthumb']);
unset($_SESSION['msgerrorthumb']);    
}

if($operazione == "modifica"){
    
    $idprodotto=$_POST['idprodotto'];
    $idcategorie=$_POST['idcategorie'];
    $nomeprodotto=$_POST['nomeprodotto'];
    $prezzo=$_POST['prezzo'];
    $quantita=$_POST['quantita'];
    $venduti=$_POST['venduti'];
    $videourl=$_POST['videourl'];
    
    $query="UPDATE prodotti SET idcategorie='$idcategorie', nomeprodotto='$nomeprodotto', prezzo='$prezzo', quantita='$quantita',
        venduti='$venduti', videourl='$videourl'
        WHERE idprodotti='$idprodotto'";
    InsData($query);
    header("Location:messaggio.php?idmess=6");
    
}

?>