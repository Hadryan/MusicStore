<?php


if(isset($_POST['password'])){
$password=md5($_POST['password']);
if($password!=$olddatauser[0]['password'])
{
    $aux=$password;
    $query=("UPDATE `musicstore`.`utenti` 
    SET `password`='$aux' WHERE `idutenti`='$aux2';");
    upData($query);
}
}

if($_POST['email']!=$olddatauser[0]['email'])
{
    $aux=$_POST['email'];
    $query=("UPDATE `musicstore`.`utenti` 
    SET `email`='$aux' WHERE `idutenti`='$aux2';");
    upData($query);
  
}

if($_POST['pagamento']!=$olddatauser[0]['pagamento'])
{
    $aux=$_POST['pagamento'];
    $query=("UPDATE `musicstore`.`utenti` 
    SET `pagamento`='$aux' WHERE `idutenti`='$aux2';");
    upData($query);

}

//aggiorna tabella anagrafiche(form anagrafica)
// nome - cognome - datadinascita - cdf - comunenascita - provnascita - cellulare
// telefono - indirizzoresidenza - numerocivicoresidenza - capresidenza
// comuneresidenza - provinciaresidenza - 
$aux2=$olddatauser[0]['idanagrafiche'];
if($_POST['nome']!=$olddatauser[0]['nome'])
{
    $aux=$_POST['nome'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `nome`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['cognome']!=$olddatauser[0]['cognome'])
{
    $aux=$_POST['cognome'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `cognome`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['datadinascita']!=$olddatauser[0]['datadinascita'])
{
    $aux=$_POST['datadinascita'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `datadinascita`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['cdf']!=$olddatauser[0]['cdf'])
{
    $aux=$_POST['cdf'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `cdf`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['comunenascita']!=$olddatauser[0]['comunenascita'])
{
    $aux=$_POST['comunenascita'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `comunenascita`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['provincianascita']!=$olddatauser[0]['provincianascita'])
{
    $aux=$_POST['provincianascita'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `provincianascita`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['cellulare']!=$olddatauser[0]['cellulare'])
{
    $aux=$_POST['cellulare'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `cellulare`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['telefono']!=$olddatauser[0]['telefono'])
{
    $aux=$_POST['telefono'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `telefono`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
if($_POST['indirizzoresidenza']!=$olddatauser[0]['indirizzoresidenza'])
{
    $aux=$_POST['indirizzoresidenza'];
    $query=("UPDATE `musicstore`.`anagrafiche` 
    SET `indirizzoresidenza`='$aux' WHERE `idanagrafiche`='$aux2';");
    upData($query);
}
?>
