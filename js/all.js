
  $(document).ready(function() {
            $("#playlist").playlist(
                {
                    playerurl: "js/drplayer/swf/drplayer.swf"
                }
            );
        });
        
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	$('#defaultCountdown').countdown({until: '5s', significant: 1, 
    layout: '{d<}{dn} {dl} {d>}{h<}{hn} {hl} {h>}{m<}{mn} {ml} {m>}{s<}{sn} {sl}{s>}'});
	$('#year').text(austDay.getFullYear());
});
    
  $(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true,
minDate: "-80Y"
});
});   
    
    
     function Addtobasket(arg)
{
    var form = document.forms['addtobasket'];
    $flag=0;
    if (form.quantita.value=='') {
    alert("Attenzione: inserire Quantita!");
    $flag=1;
    }
    if($flag==0)form.submit();
}
    
    
    
    
    function Vedi(quale) {
  document.getElementById(quale).style.display = 'block';
}
function Nascondi(quale) {
   
  document.getElementById(quale).style.display = 'none';
}
    
    function autoSlide() {
    var nextidx = (parseInt($('#slideshow .current').index() + 1) == $('#slideshow .slide').length) ? 0 : parseInt($('#slideshow .current').index() + 1);
    $('#slideshow .current').fadeOut('slow', function() {
        $(this).removeClass('current');
        $('#slideshow .slide').eq(nextidx).fadeIn('slow', function() {
            $(this).addClass('current');
        });
    });
}
setInterval(autoSlide, 6000);
    
    
    
    
	$(document).ready(function () {	
	
	$('#menu li').hover(
		function () {
			$('ul', this).stop(true, true).delay(50).slideDown(100);

		}, 
		function () {
			$('ul', this).stop(true, true).slideUp(200);		
		}
	  );
	

	});
        
        
          function VerifyFormupdate (argument){
                    
                    var form = document.forms['registration'];
                    $flag=0;
                                //errAnagrafica  
                    if (form.nome.value == '') {
                                        document.getElementById("name_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Nome'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
                                        
                                        
				}       
                                
                                
                     if (form.nome.value != '') {
                                        document.getElementById("name_error").innerHTML="";
					//alert("Attenzione: inserire 'Nome'!");
                                        
					
				}                 
                                
                     if (form.cognome.value =='') {
                                        document.getElementById("cognome_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Cognome'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                      if (form.cognome.value !='') {
                                        document.getElementById("cognome_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}   
                                
                                
                     if (form.cdf.value =='') {
                                        document.getElementById("codicefis_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Codice Fiscale'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                     if (form.cdf.value !='') {
                                        document.getElementById("codicefis_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                
                     if (form.comunenascita.value =='') {
                                        document.getElementById("comunenascita_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Comune di Nascita'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                     if (form.comunenascita.value !='') {
                                        document.getElementById("comunenascita_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                                //errResidenza
                     if (form.indirizzoresidenza.value =='') {
                                        document.getElementById("indres_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Indirizzo'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.indirizzoresidenza.value !='') {
                                        document.getElementById("indres_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                     if (form.capresidenza.value =='') {
                                        document.getElementById("cap_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'CAP'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.capresidenza.value !='') {
                                        document.getElementById("cap_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                     if (form.comuneresidenza.value =='') {
                                        document.getElementById("citta_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Citt&agrave;'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.comuneresidenzavalue !='') {
                                        document.getElementById("citta_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                     
                                
                    
                                
                                 //errProfilo
                     
                     if (form.email.value == '') {
                                        document.getElementById("email_error").innerHTML="<span style='color:red;'>Attenzione: inserire l'e-mail!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.email.value !='') {
                                        document.getElementById("email_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                     
                        
                                
                     if (form.password.value !='') {
                                        document.getElementById("pass_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}  
                           //lunghezza password     
                     if (form.password.value.length < 5 && form.password.value !='') {
                                        document.getElementById("pass_error").innerHTML="<span style='color:red;'>Attenzione: la password deve avere almeno 5 caratteri!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.password.value.length >= 5 ) {
                                        document.getElementById("pass_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                
                                //passcheck
                     if (form.password.value != form.passcheck.value) {
                                        document.getElementById("passcheck_error").innerHTML="<span style='color:red;'>Attenzione: Le password non coincidono! Reinserirle uguali!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.password.value == form.passcheck.value) {
                                        document.getElementById("passcheck_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}  
                                
                     if (form.username.value == '') {
                                        document.getElementById("username_error").innerHTML="<span style='color:red;'>Attenzione: inserire la username!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.username.value !='') {
                                        document.getElementById("username_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                 
                            //errCondizioni    
                    
                                
                                //submit se non sono rilevati errori 
                                if($flag==0)form.submit();
                                if($flag==1)self.location.hash='#errAnagrafica';
                                if($flag==2)self.location.hash='#errResidenza';
                                if($flag==3)self.location.hash='#errProfilo';
                                if($flag==4)self.location.hash='#errCondizioni';
                }
          
        
     function VerifyForm (argument){
                    var form = document.forms['registration'];
                    $flag=0;
                                //errAnagrafica  
                    if (form.nome.value == '') {
                                        document.getElementById("name_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Nome'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
                                        
                                        
				}       
                                
                                
                     if (form.nome.value != '') {
                                        document.getElementById("name_error").innerHTML="";
					//alert("Attenzione: inserire 'Nome'!");
                                        
					
				}                 
                                
                     if (form.cognome.value =='') {
                                        document.getElementById("cognome_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Cognome'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                      if (form.cognome.value !='') {
                                        document.getElementById("cognome_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}   
                                
                                
                     if (form.codicefis.value =='') {
                                        document.getElementById("codicefis_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Codice Fiscale'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                     if (form.codicefis.value !='') {
                                        document.getElementById("codicefis_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                
                     if (form.comunenascita.value =='') {
                                        document.getElementById("comunenascita_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Comune di Nascita'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=1;
				}     
                                
                     if (form.comunenascita.value !='') {
                                        document.getElementById("comunenascita_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                                //errResidenza
                     if (form.indirizzo.value =='') {
                                        document.getElementById("indres_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Indirizzo'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.indirizzo.value !='') {
                                        document.getElementById("indres_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                     if (form.cap.value =='') {
                                        document.getElementById("cap_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'CAP'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.cap.value !='') {
                                        document.getElementById("cap_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                     if (form.citta.value =='') {
                                        document.getElementById("citta_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Citt&agrave;'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.citta.value !='') {
                                        document.getElementById("citta_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                     
                                
                     if (form.interno.value =='') {
                                        document.getElementById("interno_error").innerHTML="<span style='color:red;'>Attenzione: inserire 'Interno'!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=2;
				}     
                                
                     if (form.interno.value !='') {
                                        document.getElementById("interno_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}
                                
                                 //errProfilo
                     
                     if (form.email.value == '') {
                                        document.getElementById("email_error").innerHTML="<span style='color:red;'>Attenzione: inserire l'e-mail!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.email.value !='') {
                                        document.getElementById("email_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                     
                     if (form.password.value == '') {
                                        document.getElementById("pass_error").innerHTML="<span style='color:red;'>Attenzione: inserire la password!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.password.value !='') {
                                        document.getElementById("pass_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}  
                           //lunghezza password     
                     if (form.password.value.length < 5 ) {
                                        document.getElementById("pass_error").innerHTML="<span style='color:red;'>Attenzione: la password deve avere almeno 5 caratteri!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.password.value.length >= 5 ) {
                                        document.getElementById("pass_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                
                                //passcheck
                     if (form.password.value != form.passcheck.value) {
                                        document.getElementById("passcheck_error").innerHTML="<span style='color:red;'>Attenzione: Le password non coincidono! Reinserirle uguali!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.password.value == form.passcheck.value) {
                                        document.getElementById("passcheck_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}  
                                
                     if (form.username.value == '') {
                                        document.getElementById("username_error").innerHTML="<span style='color:red;'>Attenzione: inserire la username!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=3;
				}     
                                
                     if (form.username.value !='') {
                                        document.getElementById("username_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				} 
                                 
                            //errCondizioni    
                     if (!form.checkcond.checked) {
                                        document.getElementById("check_error").innerHTML="<span style='color:red;'>Attenzione: Devi accettare le condizioni!<\/span> ";
					//alert("Attenzione: inserire 'Nome'!");
					$flag=4;
				}     
                                
                     if (form.checkcond.checked) {
                                        document.getElementById("check_error").innerHTML=""		//alert("Attenzione: inserire 'Nome'!");
					
				}  
                                
                                //submit se non sono rilevati errori 
                                if($flag==0)form.submit();
                                if($flag==1)self.location.hash='#errAnagrafica';
                                if($flag==2)self.location.hash='#errResidenza';
                                if($flag==3)self.location.hash='#errProfilo';
                                if($flag==4)self.location.hash='#errCondizioni';
                }
                
                 function Acquista(argument){
                 var form = document.forms['acquista'];
                 form.submit();
                 }
      
      
      function login(arg) {
				var form = document.forms['dataentry']; // accesso oggetto form
				flag=1;
                                
				if (form.username.value == '') {
					alert("Attenzione: inserire 'Username'!");
					flag=0;
				}
				
				if (form.password.value == '') {
					alert("Attenzione: inserire 'Password'!");
					flag=0;
				}
											
				if(flag==1){form.submit();}
				
			}
      
      function strcmp(a, b) {
    if (a.toString() < b.toString()) return -1;
    if (a.toString() > b.toString()) return 1;
    return 0;
}
      
      
 //*****************************AJAX Javascript***********************************

var XMLHTTP;

function Richiesta(Stringa)
{
     if (Stringa.length > 0)
    {
     
        var url = "ajax.php?username=" + Stringa;
        XMLHTTP = RicavaBrowser(CambioStato);
        XMLHTTP.open("GET", url, true);
        XMLHTTP.send(null);
    }
    else
    {
        document.getElementById("risultati").innerHTML = "";
    } 
}

function Richiestacod(Stringa)
{
    if (Stringa.length > 0)
    {
        var url = "ajax.php?codicefis=" + Stringa;
        XMLHTTP = RicavaBrowser(CambioStatocod);
        XMLHTTP.open("GET", url, true);
        XMLHTTP.send(null);
    }
    else
    {
        document.getElementById("codesistente_error").innerHTML = "";
    } 
}

function CambioStatocod()
{
    if (XMLHTTP.readyState == 4)
    {
        var R = document.getElementById("codesistente_error");
        if(strcmp(XMLHTTP.responseText,"Codice Fiscale OK!")==0){R.innerHTML ='<span style="color:green;">'+XMLHTTP.responseText+'<\//span>';}
        else{R.innerHTML =XMLHTTP.responseText};
    }
}


function CambioStato()
{
    if (XMLHTTP.readyState == 4)
    {
        var R = document.getElementById("risultati");
        if(strcmp(XMLHTTP.responseText,"Username OK!")==0){R.innerHTML ='<span style="color:green;">'+XMLHTTP.responseText+'<\/span>';}
        else{R.innerHTML =XMLHTTP.responseText};
    }
}




function RicavaBrowser(QualeBrowser)
{
    if (navigator.userAgent.indexOf("MSIE") != (-1))
    {
        var Classe = "Msxml2.XMLHTTP";
        if (navigator.appVersion.indexOf("MSIE 5.5") != (-1));
        {
            Classe = "Microsoft.XMLHTTP";
        } 
        try
        {
            OggettoXMLHTTP = new ActiveXObject(Classe);
            OggettoXMLHTTP.onreadystatechange = QualeBrowser;
            return OggettoXMLHTTP;
        }
        catch(e)
        {
            alert("Errore: l'ActiveX non verrÃ  eseguito!");
        }
    }
    else if (navigator.userAgent.indexOf("Mozilla") != (-1))
    {
        OggettoXMLHTTP = new XMLHttpRequest();
        OggettoXMLHTTP.onload = QualeBrowser;
        OggettoXMLHTTP.onerror = QualeBrowser;
        return OggettoXMLHTTP;
    }
    else
    {
        alert("L'esempio non funziona con altri browser!");
    }
}
 //*****************************end of AJAX Javascript***********************************

 $(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true,
minDate: "-80Y"
});
});
      
  