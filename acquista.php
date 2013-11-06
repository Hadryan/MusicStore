<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/product.inc.php";


print_r($_SESSION['carrello']);
$data=date("Y-m-d H:i:s");
$idutenti=$_SESSION['idutenti'];

$m=count($_SESSION['carrello']);


//totale dell'ordine
for($i=0;$i<$m;$i++)
    {
        $idprod=$_SESSION['carrello'][$i]['idprodotto'];
        $result2=getproductbyid($_SESSION['carrello'][$i]['idprodotto']);
        $totale=$totale+($result2[$i]['prezzo']*$_SESSION['carrello'][$i]['quantita']);
       
     }
$query=("INSERT INTO ordini VALUES('','$idutenti','$data','','$totale')");
insData($query);

$ultimo_id=mysql_insert_id();
//echo $ultimo_id;





    for($i=0;$i<$m;$i++)
    {
        $idprod=$_SESSION['carrello'][$i]['idprodotto'];
        $prodotti=getproductbyid($idprod);
        //$result2=getproductbyid($_SESSION['carrello'][$i]['idprodotto']);
        //$totale=$totale+$result2['prezzo'];
        
        $quant[$i]=$_SESSION['carrello'][$i]['quantita'];
        $query=("INSERT INTO ordini_has_prodotti VALUES('$ultimo_id','$idprod','$quant[$i]')");
        insData($query);
        
        $quantita=$prodotti[0]['quantita']-$quant[$i];
        $query=("UPDATE prodotti
    SET quantita={$quantita}
    WHERE idprodotti=$idprod");
    }
    insData($query);

    //svuota carrello
unset($_SESSION['carrello']);


header('Location:messaggio.php?idmess=3');


?>