<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";// libreria gestione sessioni
require "include/product.inc.php";// libreria gestione prodotti

$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['newpass'];

if($username=="" || $email=="" || $pass==""){
    echo "<h3>ERRORE Ci sono campi vuoti! Tornare indietro e riprovare!</h3>";
    exit();
}

$newpass=md5($pass);

InsData("UPDATE utenti SET password='$newpass' WHERE username='$username' AND email='$email'");

header("Location:messaggio.php?idmess=5");


?>
