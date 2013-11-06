<?php
require "include/template2.inc.php";
require "include/dbms.inc.php";
require "include/sessionuser.inc.php"; // libreria gestione sessioni

if(isset( $_GET["codicefis"] )){
    $codicefis = $_GET["codicefis"];
    $result=mysql_query("SELECT codicefis FROM utenti WHERE codicefis='$codicefis'");
    
    $num=@mysql_num_rows($result);

   
    if($num != ""){
        echo "Codice Fiscale gi&agrave; registrato nel sistema! Si prega di cambiarlo!";
        
    }
    else{
        if(strlen($codicefis)!=16){
            echo "Codice Fiscale errato! Si prega di correggerlo!";
           
        }
        else{
            echo "Codice Fiscale OK!";
            
        }
    }
}

if(isset( $_GET["username"] )){
    $username = $_GET["username"];
    $result=mysql_query("SELECT username FROM utenti WHERE username='$username'");
    
    $num=@mysql_num_rows($result);
    
    $i=0;
        while ($i < $num) {
         $user=mysql_result($result,$i,"username");
         $i++;
	}

   
    if(-1==strcmp($username, $user) || 0==strcmp($username, $user)){
        echo "Username esistente! Si prega di cambiarlo!";
    }
    else{
        echo "Username OK!";
    }
}
/*procedura che trova lo username lettera per lettera e ritorna il risultato
    
    if (strlen($nome) > 0)
    {
        $risultato = "";
        for ($i=0; $i<count($result); $i++)
        {
            if (strtoupper($nome) == strtoupper(substr($user[$i], 0, strlen($nome))))
            {
                if ($risultato == "")
                {
                    $risultato = $user[$i];
                }
                else
                {
                    $risultato .= ", " . $user[$i];
                }
            }
        } 
    } 

    if ($risultato == "")
    {
        echo "OK";
    }
    else
    {
        echo $risultato;
    }
 */

?>