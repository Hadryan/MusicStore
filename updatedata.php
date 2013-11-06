<?php
require "include/product.inc.php";
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";


$userid=$_SESSION['idutenti'];
;
$olddatauser=getuserbyid($userid);


//controllo quali campi aggiornare
//aggiorna tabella utenti(form profilo)
$_POST['password']=  md5($_POST['password']);

$aux2=$_SESSION['idutenti'];
$utenti=getutentibyid($_SESSION['idutenti']);
foreach($utenti[0] as $k=>$v)
{
  if(isset($_POST[$k]) && !empty($_POST[$k]))
  {
      
      if($_POST[$k]!=$utenti[0][$k])
      {
    $aux=$_POST[$k];
    $query=("UPDATE `musicstore`.`utenti` 
    SET `$k`='$aux' WHERE `idutenti`='$aux2';");
    upData($query); 
      }
  }

}    

//anagrafiche

$aux2=$olddatauser[0]['idanagrafiche'];
$anagrafiche=getanagrafichebyid($aux2);

foreach($anagrafiche[0] as $k=>$v)
{
  if(isset($_POST[$k]) && !empty($_POST[$k]))
  {
      
      if($_POST[$k]!=$anagrafiche[0][$k])
      {
    $aux=$_POST[$k];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `$k`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query); 
      }
  }
  

}  

//indirizzo spedizione


$aux2=$olddatauser[0]['idindirizzospedizione'];
$indsped=getspedizionebyid($aux2);

foreach($indsped[0] as $k=>$v)
{
  if(isset($_POST[$k]) && !empty($_POST[$k]))
  {
      
      if($_POST[$k]!=$indsped[0][$k])
      {
    $aux=$_POST[$k];
    $query=("UPDATE `musicstore`.`indirizzospedizione` 
    SET `$k`='$aux' WHERE `idindirizzospedizione`='$aux2';");
    upData($query); 
      }
  }
  

}  


//immutenti
$aux2=$olddatauser[0]['idimmutenti'];
$imm=getimmutentibyid($aux2);

foreach($imm[0] as $k=>$v)
{
  if(isset($_POST[$k]) && !empty($_POST[$k]))
  {
      
      if($_POST[$k]!=$imm[0][$k])
      {
    $aux=$_POST[$k];
    $query=("UPDATE `musicstore`.`immutenti` 
    SET `$k`='$aux' WHERE `idimmutenti`='$aux2';");
    upData($query); 
      }
  }

}  


   
 


//vecchio aggiorna email
$email=$_POST['email'];
if(strcmp($olddatauser[0]['email'],$_POST['email'])!=0){

    $check=chkEmail($email);
	if($check == false){
		echo "<h3>E-mail inserita non valida. Tornare indietro e reinserire un indirizzo e-mail valido!</h3>";
		
        }
        else{
   $aux=$_POST['email'];
   $aux2=$_SESSION['idutenti'];
   $query=("UPDATE `musicstore`.`utenti` SET `email`='$aux' WHERE `idutenti`='$aux2';");
   //upData($query);
        }
    
}

function chkEmail($email)
{
	// elimino spazi, "a capo" e altro alle estremità della stringa
	$email = trim($email);

	// se la stringa è vuota sicuramente non è una mail
	if(!$email) {
		return false;
	}

	// controllo che ci sia una sola @ nella stringa
	$num_at = count(explode( '@', $email )) - 1;
	if($num_at != 1) {
		return false;
	}

	// controllo la presenza di ulteriori caratteri "pericolosi":
	if(strpos($email,';') || strpos($email,',') || strpos($email,' ')) {
		return false;
	}

	// la stringa rispetta il formato classico di una mail?
	if(!preg_match( '/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $email)) {
		return false;
	}

	return true;
}

        
        






header('Location:messaggio.php?idmess=5');


?>
