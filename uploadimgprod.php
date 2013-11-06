<?php

require "include/template2.inc.php";// motore template
require "include/dbms.inc.php"; //connessione al db
require "include/sessionuser.inc.php"; // libreria gestione sessioni

$flag=1;

 do {   
        
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    // Controllo che il file non superi i 18 KB
    if ($_FILES['image']['size'] > 180432) {
      $msg .= "Il file non deve superare i 18 KB!!";
      $flag=0;
      break;
    }
    // Ottengo le informazioni sull'immagine
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    // Controllo che le dimensioni (in pixel) non superino 160x180
    if (($width > 225) || ($height > 225)) {
      $msg .= "Dimensioni non corrette!!";
      $flag=0;
      break;
    }
    // Controllo che il file sia in uno dei formati GIF, JPG o PNG
    if (($type!=1) && ($type!=2) && ($type!=3)) {
      $msg .= "Formato non corretto!!";
      $flag=0;
      break;
    }
    // Verifico che sul sul server non esista già un file con lo stesso nome
    // generanomecasuale
    if (file_exists('./img/product/'.$_FILES['image']['name'])) {
        $code = md5(time());
        $code.=$_FILES['image']['name'];
        $_FILES['image']['name']=$code;
        //echo "$code";
      
      
    }
    // Sposto il file nella cartella da me desiderata
    if (!move_uploaded_file($_FILES['image']['tmp_name'], './img/product/'.$_FILES['image']['name'])) {
      $msg .= "Errore nel caricamento dell'immagine!!";
      $flag=0;
      break;
    }
  }else{
      $msg .= "Errore nel caricamento dell'immagine!! Non hai inserito nessuna immagine!!";
      $flag=0;
      break;}
      
} while (false);

if($flag==1){$msg="Immagine caricata con successo!";}
$_SESSION['msgerror']=$msg; //errore nel caricamento immagine
$_SESSION['imgurlproduct']='img/product/'.$_FILES['image']['name']; //url dell'immagine
$res=$_GET['idgen'];
unset($_FILES);
header("location:gestione_prodotti.php?idgenere=".$res."&valore=Inserisci+prodotto");


?>