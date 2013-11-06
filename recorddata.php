<?php

require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php";

print_r($_POST);

$username=$_POST['username'];
$email=$_POST['email'];

$query2="SELECT username FROM utenti WHERE username='$username'";
$usernameres=getResult($query2);

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

        $check=chkEmail($email);
	if($check == false){
		echo "<h3>E-mail inserita non valida. Tornare indietro e reinserire un indirizzo e-mail valido!</h3>";
		exit();
        }
        
if($usernameres != NULL){
    echo"<h3>ERRORE!! La username inserita esiste gi&agrave;!! Tornare indietro e reinserirne un'altra!</h3>";
    exit();
}


$data=date("Y-m-d H:i:s");


//carica dati nel db
//se abbiamo settato un indirizzo di spedizione
if(!empty($_POST['indirizzosp']))
{
    $indirizzospedizione.=$_POST['tipoindsped']." ".$_POST['indirizzosp'];
    $numerocivicospedizione=$_POST['numsp'];
    $capspedizione=$_POST['capsp'];
    $cittaspedizione=$_POST['cittasp'];
    $provinciaspedizione=$_POST['provsp'];
    $internospedizione=$_POST['internosp'];
    
    $query="INSERT INTO indirizzospedizione VALUES(
    '',
    '$indirizzospedizione',
    '$numerocivicospedizione',
    '$capspedizione',
    '$cittaspedizione',
    '$provinciaspedizione',
    '$internospedizione')";
     echo $query;
    
    $result=insData($query);
    $query="SELECT idindirizzospedizione FROM indirizzospedizione WHERE indirizzospedizione='$indirizzospedizione'";
   
    $result=getResult($query);
    foreach($result as $k => $v){           
    $idindirizzospedizione=$result[0]['idindirizzospedizione'];
    }
}

//carichiamo immagine del profilo
$urlimgutenti=$_POST['imgurl'];
$altimgutenti="imgprofilo";
$query="INSERT INTO immutenti VALUES('','$altimgutenti','$urlimgutenti')";
echo $query;
//insData($query);

$query="SELECT idimmutenti FROM immutenti WHERE urlimgutenti='$urlimgutenti'";
$result=getResult($query);
foreach($result as $k => $v){           
    $idimmutenti=$v['idimmutenti'];
}



//carichiamo anagrafiche

$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$sesso=$_POST['sesso'];
$datadinascita=$_POST['data'];
$cdf=$_POST['codicefis'];
$comunenascita=$_POST['comunenascita'];
$provincianascita=$_POST['provnascita'];
$cellulare=$_POST['cellulare'];
$telefono=$_POST['telefono'];
$indirizzoresidenza=$_POST['indirizzo'];
$numerocivicoresidenza=$_POST['numero'];
$capresidenza=$_POST['cap'];
$comuneresidenza=$_POST['citta'];
$provinciaresidenza=$_POST['provincia'];




$query="INSERT INTO anagrafiche VALUES('','$nome','$cognome','$sesso','$datadinascita','$cdf','$comunenascita',
    '$provincianascita','$cellulare','$telefono','$indirizzoresidenza','$numerocivicoresidenza','$capresidenza','$comuneresidenza',
'$provinciaresidenza','$data','$data')";

insData($query);
$query="SELECT idanagrafiche FROM anagrafiche WHERE cdf='$cdf'";
$result=getResult($query);
foreach($result as $k => $v){           
    $idanagrafiche=$v['idanagrafiche'];
}



//carichiamo utenti

$username=$_POST['username'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$isactive=1;
$pagamento=$_POST['pagamento'];

$query="INSERT INTO utenti VALUES(
'',
'$idanagrafiche',
'$idimmutenti',
'$idindirizzospedizione',
'2',
'$username',
'$password',
'$email',
'$isactive',
'$data',
'$pagamento'  
)";

echo $query;
$result=insData($query);

header('Location:messaggio.php?idmess=0');


?>
