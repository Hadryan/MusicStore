<?php


function anti_injection($input){
    $pulito=strip_tags(addslashes(trim($input)));
    $pulito=str_replace("'","\'",$pulito);
    $pulito=str_replace('"','\"',$pulito);
    $pulito=str_replace(';','\;',$pulito);
    $pulito=str_replace('--','\--',$pulito);
    $pulito=str_replace('+','\+',$pulito);
    $pulito=str_replace('(','\(',$pulito);
    $pulito=str_replace(')','\)',$pulito);
    $pulito=str_replace('=','\=',$pulito);
    $pulito=str_replace('>','\>',$pulito);
    $pulito=str_replace('<','\<',$pulito);
    
   
        
    
    return $pulito;
}







?>