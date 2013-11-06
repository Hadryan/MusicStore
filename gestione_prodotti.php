<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

if($_SESSION['id_gruppi'] != 1){
    header("Location:messaggio.php?idmess=4");
}
else{
    
if($_GET['valore']== "Cancella Prodotto"){
    if(isset($_GET['idgenere'])){
        $idgenere=$_GET['idgenere'];
        
        $main = new Skin("musicstore");

        $main = new Skinlet("gestione_prodotti");

           //header diviso in 2
        $header = new Skinlet("header");

$page=$_GET['page'];

$nomegenere=("SELECT * FROM generimusicali WHERE idgenerimusicali='$idgenere'");
$nomegenere=getResult($nomegenere);
$nomegenere=$nomegenere[0]['nomegeneri'];
//setta il nome del genere


//gestisce indici di pagine in modo dinamico
if($page>0){$index=(21*$page)+1;}
else {$index=0;}


        $footer = new Skinlet("footer");
        $slider = new Skinlet ("slider");



        $header->setContent("headprofilo",$headprofilo->get());

        $result=getproductbygenere($idgenere);
        
if(empty($result)){$main->setContent('empty','NON CI SONO ELEMENTI PER QUESTO GENERE');}
//print_r($result);
$main->setContent('nomegenere',$nomegenere);
$main->setContent('pagina',$page);
$m=count($result);//quantita elementi nell'array
$p=$m;
$j=0;
for($i=$index;$i<$m;$i++){    
$producticon=new Skinlet("product_cancella");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="producticon";
$stringa.=$j;
$producticon->setContent("urlthumb",$result[$i]['urlthumbprodotti']);
$producticon->setContent("urlproduct",$result[$i]['idprodotti']);
$producticon->setContent("altimg",$result[$i]['altimmprodotti']);
$newstringa=titlelen($result[$i]['nomeprodotto']);

$producticon->setContent("nomeprodotto",$newstringa);
$producticon->setContent("autore",$result[$i]['nomeautore']);
$main->setContent($stringa,$producticon->get());
$stringa="";
$j++;
}

//link delle pagine
$l=(int)($p/21);
$link="";
for($i=0;$i<($l+1);$i++)
{
   if($m>21){
   $link.="<a href=\"gestione_prodotti.php?idgenere=".$idgenere."&page=".$i."&valore=Cancella%20Prodotto\">".$i."</a>";
   if($i!=$l)$link.=" - ";
   }
}
$link.="";
$main->setContent('pagine',$link); 

        $main->setContent("header", $header->get());
        $main->setContent("footer", $footer->get());


        $main->close();
  }
    }
    
    
  if($_GET['valore']== "Inserisci prodotto"){
      $idgenere=$_GET['idgenere'];
      $main = new Skin("musicstore");

$main = new Skinlet("inserisci_prodotto");
$result1=getResult("SELECT * FROM categorie");
$tipoautori=getResult("SELECT * FROM tipo_autori");

//header diviso in 2
$header = new Skinlet("header");



if(isset($_SESSION['imgurlproduct']))
{
   if(isset($_SESSION['msgerror']))
   {
       //in caso di errore stampa il messaggio e imposta l'immagine di default
       if(strcmp($_SESSION['msgerror'],"Immagine caricata con successo!")==0){
       $main->setContent("okimg",$_SESSION['msgerror']);
        $imgurl.='"'; 
        //inserisci nel campo hidden della form di registrazione
   // l'url dell'immagine del profilo
   $imgurl.=$_SESSION['imgurlproduct'];
   $imgurl.='"'; 
   $main->setContent("imgurlproduct",$imgurl);
   $main->setContent("erroreimg","");
       }
       
       else{
       $main->setContent("erroreimg",$_SESSION['msgerror']);
       $main->setContent("imgurlproduct","");
   }
   
   }
   
}
unset($imgurl);



if(isset($_SESSION['imgurlthumb']))
{
   if(isset($_SESSION['msgerrorthumb']))
   {
       //in caso di errore stampa il messaggio e imposta l'immagine di default
       if(strcmp($_SESSION['msgerrorthumb'],"Immagine caricata con successo!")==0){
       $main->setContent("okimgthumb",$_SESSION['msgerrorthumb']);
        $imgurl.='"'; 
        //inserisci nel campo hidden della form di registrazione
   // l'url dell'immagine del profilo
   $imgurl.=$_SESSION['imgurlthumb'];
   $imgurl.='"'; 
   $main->setContent("imgurlthumb",$imgurl);
   $main->setContent("erroreimgthumb","");
       }
       
       else{
       $main->setContent("erroreimgthumb",$_SESSION['msgerrorthumb']);
       $main->setContent("imgurlthumb","");
   }
   
   }
   
}
unset($imgurl);


$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");

$header->setContent("headprofilo",$headprofilo->get());

$main->setContent("tipoautore", $tipoautori);
$main->setContent("selecttipo", $result1);
$main->setContent("idgenere", $idgenere);
$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();
      
  }
  
  if($_GET['valore']== "Modifica Prodotto"){
      $idgenere=$_GET['idgenere'];
      $idgenere=$_GET['idgenere'];
        
        $main = new Skin("musicstore");

        $main = new Skinlet("gestione_prodotti");

           //header diviso in 2
        $header = new Skinlet("header");

$page=$_GET['page'];

$nomegenere=("SELECT * FROM generimusicali WHERE idgenerimusicali='$idgenere'");
$nomegenere=getResult($nomegenere);
$nomegenere=$nomegenere[0]['nomegeneri'];
//setta il nome del genere


//gestisce indici di pagine in modo dinamico
if($page>0){$index=(21*$page)+1;}
else {$index=0;}


        $footer = new Skinlet("footer");
        $slider = new Skinlet ("slider");



        $header->setContent("headprofilo",$headprofilo->get());

        $result=getproductbygenere($idgenere);
        
if(empty($result)){$main->setContent('empty','NON CI SONO ELEMENTI PER QUESTO GENERE');}
//print_r($result);
$main->setContent('nomegenere',$nomegenere);
$main->setContent('pagina',$page);
$m=count($result);//quantita elementi nell'array
$p=$m;
$j=0;
for($i=$index;$i<$m;$i++){    
$producticon=new Skinlet("product_modifica");
//echo $i;
//echo isset($result[$i]['urlthumbprodotti']);
$stringa.="producticon";
$stringa.=$j;
$producticon->setContent("urlthumb",$result[$i]['urlthumbprodotti']);
$producticon->setContent("urlproduct",$result[$i]['idprodotti']);
$producticon->setContent("altimg",$result[$i]['altimmprodotti']);
$newstringa=titlelen($result[$i]['nomeprodotto']);

$producticon->setContent("nomeprodotto",$newstringa);
$producticon->setContent("autore",$result[$i]['nomeautore']);
$main->setContent($stringa,$producticon->get());
$stringa="";
$j++;
}

//link delle pagine
$l=(int)($p/21);
$link="";
for($i=0;$i<($l+1);$i++)
{
   if($m>21){
   $link.="<a href=\"gestione_prodotti.php?idgenere=".$idgenere."&page=".$i."&valore=Modifica%20Prodotto\">".$i."</a>";
   if($i!=$l)$link.=" - ";
   }
}
$link.="";
$main->setContent('pagine',$link); 

        $main->setContent("header", $header->get());
        $main->setContent("footer", $footer->get());


        $main->close();
  }

 if($_GET['valore']== ""){
      
$main = new Skin("musicstore");

$main = new Skinlet("select_categoria");
$categorie=getResult("SELECT * FROM generimusicali");

//header diviso in 2
$header = new Skinlet("header");




$footer = new Skinlet("footer");
$slider = new Skinlet ("slider");



$header->setContent("headprofilo",$headprofilo->get());


$main->setContent("selectcategorie", $categorie);
$main->setContent("header", $header->get());
$main->setContent("footer", $footer->get());


$main->close();
  }
    
}


?>