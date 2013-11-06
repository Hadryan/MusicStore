<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

$idprod=$_GET['idprod'];

print_r($idprod);
echo "<br/>";
print_r($_SESSION['carrello']);
echo "</br>";

 $m=count($_SESSION['carrello']);
 echo $m;
    for($i=0;$i<$m;$i++)
    {
        if($idprod==$_SESSION['carrello'][$i]['idprodotto'])
        {
           unset($_SESSION['carrello'][$i]['idprodotto']);
           unset($_SESSION['carrello'][$i]['quantita']);
           unset($_SESSION['carrello'][$i]);
           header('Location:carrello.php');   
        }
        
    }
    
 header('Location:carrello.php');   
 $m=count($_SESSION['carrello']);    
echo "<br/>";    
print_r($idprod);
echo "<br/>";
print_r($_SESSION['carrello']);
echo "</br>";
echo $m;
    


?>

