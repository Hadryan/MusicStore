<?php


function titlelen($stringa)
{
    $newstring="";
    if(strlen($stringa)>12){
    for($j=0;$j<12;$j++)
    {
        $newstring.=$stringa[$j];
    }
    $newstring.="...";
    return $newstring;
}
else return $stringa;
}

function search($stringa)
{
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             WHERE nomeprodotto LIKE '%$stringa%' OR nomeautore LIKE '%$stringa%'");
     $result=getResult($query);
    return $result; 
}

function getGruppi()
{
  $query=("SELECT * FROM gruppi");
     $result=getResult($query);
    return $result;   
}

function getproductbydate()
{
    //tutti i prodotti ordinati in ordine decrescente per data
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             ORDER BY datains DESC
             ");
    $result=getResult($query);
    return $result;   
    
}
function getproductorderbygen()
{
    //tutti i prodotti ordinati in ordine decrescente per data
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             ORDER BY idgeneri DESC
             ");
    $result=getResult($query);
    return $result;   
    
}


function getproductbygenere($idgeneri)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per data
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             INNER JOIN generimusicali ON prodotti.idgeneri=generimusicali.idgenerimusicali
             WHERE prodotti.idgeneri='$idgeneri' ORDER BY datains DESC
             ");
    $result=getResult($query);
    return $result;   
    
}


function bestseller()
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             INNER JOIN generimusicali ON prodotti.idgeneri=generimusicali.idgenerimusicali
            ORDER BY venduti DESC
             ");
    $result=getResult($query);
    return $result;   
    
}

function getproductbygenerebestseller($idgeneri)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             INNER JOIN generimusicali ON prodotti.idgeneri=generimusicali.idgenerimusicali
             WHERE prodotti.idgeneri='$idgeneri' ORDER BY venduti DESC
             ");
    $result=getResult($query);
    return $result;   
    
}

function getproductbyid($idprodotto)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM prodotti 
             INNER JOIN categorie ON prodotti.idcategorie=categorie.idcategorie
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             INNER JOIN produttori ON prodotti.idproduttori=produttori.idproduttori
             INNER JOIN immprodotti ON prodotti.idimmprodotti=immprodotti.idimmprodotti
             INNER JOIN generimusicali ON prodotti.idgeneri=generimusicali.idgenerimusicali
             WHERE prodotti.idprodotti='$idprodotto' 
             ");
    $result=getResult($query);
    return $result;   
    
}

function getproductbyautore($idautore)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM prodotti 
            WHERE idautori='$idautore' 
             ");
    $result=getResult($query);
    
    return $result;   
    
}

function getanagrafichebyid($id)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM anagrafiche 
            WHERE idanagrafiche='$id' 
             ");
    $result=getResult($query);
    
    return $result;   
    
}

function getspedizionebyid($id)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM indirizzospedizione 
            WHERE idindirizzospedizione='$id' 
             ");
    $result=getResult($query);
    
    return $result;   
    
}

function getimmutentibyid($id)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM immutenti 
            WHERE idimmutenti='$id' 
             ");
    $result=getResult($query);
    
    return $result;   
}

function getutentibyid($id)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM utenti 
            WHERE idutenti='$id' 
             ");
    $result=getResult($query);
    
    return $result;   
    
}


function gettraksbyid($idprodotto)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per venduti
    $query=("SELECT * FROM tracce WHERE idprodotti='$idprodotto'
             ");
    $result=getResult($query);
    return $result;   
    
}


function getordinibyuserid($iduser)
{
        
    $query=("SELECT * FROM ordini 
             INNER JOIN ordini_has_prodotti ON ordini.idordini=ordini_has_prodotti.idordini
             INNER JOIN prodotti ON ordini_has_prodotti.idprodotti=prodotti.idprodotti
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             WHERE ordini.idutenti=$iduser ORDER BY dataordine DESC 
             ");
    $result=getResult($query);
    return $result; 
}

function getordini()
{
        
    $query=("SELECT * FROM ordini 
             INNER JOIN utenti ON utenti.idutenti=ordini.idutenti
             INNER JOIN ordini_has_prodotti ON ordini.idordini=ordini_has_prodotti.idordini
             INNER JOIN prodotti ON ordini_has_prodotti.idprodotti=prodotti.idprodotti
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             ORDER BY dataordine DESC 
             ");
    $result=getResult($query);
    return $result; 
}

function getordinibyid($idord)
{
        
    $query=("SELECT * FROM ordini 
             INNER JOIN utenti ON utenti.idutenti=ordini.idutenti
             INNER JOIN ordini_has_prodotti ON ordini.idordini=ordini_has_prodotti.idordini
             INNER JOIN prodotti ON ordini_has_prodotti.idprodotti=prodotti.idprodotti
             INNER JOIN autori ON prodotti.idautori=autori.idautori
             WHERE ordini.idordini=$idord ORDER BY dataordine DESC 
             ");
    $result=getResult($query);
    return $result; 
}

function getuserbyid($iduser)
{
    //tutti i prodotti di idgenere ordinati in ordine decrescente per data
    $query=("SELECT * FROM utenti
             INNER JOIN anagrafiche ON utenti.idanagrafiche=anagrafiche.idanagrafiche
             INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti
			 INNER JOIN indirizzospedizione ON utenti.idindirizzospedizione=indirizzospedizione.idindirizzospedizione	
             WHERE utenti.idutenti=$iduser 
             ");
    $result=getResult($query);
    
    if(empty($result))//indirizzo spedizione non settato esegui una query senza la spedizione
    {
         $query=("SELECT * FROM utenti
             INNER JOIN anagrafiche ON utenti.idanagrafiche=anagrafiche.idanagrafiche
             INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti	
             WHERE utenti.idutenti=$iduser 
             ");
    $result=getResult($query);
    }
    return $result;   
}

function getprovincianascitabyuserid($iduser)
{
    $query=("SELECT * FROM utenti
             INNER JOIN anagrafiche ON utenti.idanagrafiche=anagrafiche.idanagrafiche
             INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti
             INNER JOIN provincie ON anagrafiche.provincianascita=provincie.idprovincie 
             WHERE utenti.idutenti=$iduser 
             ");
    $result=getResult($query);
    return $result;
}

function getprovinciaresbyuserid($iduser)
{
    $query=("SELECT * FROM utenti
             INNER JOIN anagrafiche ON utenti.idanagrafiche=anagrafiche.idanagrafiche
             INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti
             INNER JOIN provincie ON anagrafiche.provinciaresidenza=provincie.idprovincie 
             WHERE utenti.idutenti=$iduser 
             ");
    $result=getResult($query);
    return $result;
}

function getprovinciaspedizionebyuserid($iduser)
{
     $query=("SELECT * FROM utenti
             INNER JOIN anagrafiche ON utenti.idanagrafiche=anagrafiche.idanagrafiche
             INNER JOIN immutenti ON utenti.idimmutenti=immutenti.idimmutenti
             INNER JOIN indirizzospedizione ON utenti.idindirizzospedizione=indirizzospedizione.idindirizzospedizione
	     INNER JOIN provincie ON indirizzospedizione.provinciaspedizione=provincie.idprovincie 
             WHERE utenti.idutenti=$iduser 
             ");
    $result=getResult($query);
    return $result;
}
   
function getprovincie()
{
     $query=("SELECT * FROM provincie
             ");
    $result=getResult($query);
    return $result;
}

function switchstatusord($idord)
{
    
     $result=getordinibyid($idord);
     
     if($result[0]['evaso']==0){$query=("UPDATE ordini
    SET evaso=1
    WHERE idordini=$idord
    ");}
    else{
        $query=("UPDATE ordini
    SET evaso=0
    WHERE idordini=$idord
    ");
    }
     
     insData($query);
    
}

?>