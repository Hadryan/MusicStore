<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti


   
            unset($_SESSION['carrello']);
           
        
       
    

header('Location:carrello.php');

?>