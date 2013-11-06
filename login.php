<?php



require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni
require "include/security.inc.php"; // libreria gestione sessioni

$username=$_POST['username'];
$password=md5($_POST['password']);



$username=anti_injection($username);
$password=anti_injection($password);



$query="SELECT * FROM utenti WHERE username='$username' AND password='$password'";
$result=getResult($query);

print_r($result);
print_r($_POST);

if(!empty($result))
{
    if($result[0]['isactive']!=0){
    session_start();
    $_SESSION['idsession']=md5($username);
    $_SESSION['username']=$username;
    $_SESSION['id_gruppi']=$result[0]['idgruppi'];
    foreach($result as $k => $v){           
    $_SESSION['idutenti']=$v['idutenti'];
    }
  
    header('Location:messaggio.php?idmess=1&loginsuccess=1');
    
    }
    else{
    header('Location:messaggio.php?idmess=1&loginsuccess=2');
}
} 
else {
    header('Location:messaggio.php?idmess=1&loginsuccess=0');
}







?>