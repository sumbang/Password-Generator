<?php

// strtoupper : convertir une chaine en majuscule

// strtolower : convertir une chaine en miniscule

// ucfirst : met le 1er caractère en majuscule

// ucwords : met en majuscule la 1ere lettre de tout les mots

// mb_strtoupper : met tout les caractères en majuscule

// strtr : remplace des caractères dans une chaine  / $addr = strtr($addr, "äåö", "aao");


if(isset($_POST["generate"])){

   $taille=$_POST["taille"]; 

   if(!is_numeric($taille)) $taille=8; else if($taille<8) $taille=8; else if($taille>128) $taille=128;

   $cf=$_POST["cf"]; $kt=$_POST["kt"]; $pt=$_POST["pt"]; $ac=$_POST["ac"];

   $string = "";

   $maj="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; $min="abcdefghijklmnopqrstuvwxyz"; $pointu=":;,.";

   $chif="0123456789"; $spec="!#$%&()*+-/<=>?@[]_{|}~§"; $accen="éèàêï^£ôûî";

   $string=$maj."".$min;

   if($cf==0) $string=$string."".$chif; 

   if($kt==0) $string=$string."".$spec; 

   if($pt==0) $string=$string."".$pointu; 

   if($ac==0) $string=$string."".$accen; $retour="";


   // génération du mot de passe

   srand((double)microtime()*1000000);

   for($i=0; $i<$taille; $i++) {

   $retour .= $string[rand()%strlen($string)];  }

      
   // on doit maintenant vérifier si la chaîne retourné comprend au moins une lettre majuscule et une miniscule
   
   $retour=ucfirst($retour);

   echo utf8_encode($retour);


}


?>