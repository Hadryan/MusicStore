<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni

session_destroy();

 
header('Location:messaggio.php?idmess=2');



?>