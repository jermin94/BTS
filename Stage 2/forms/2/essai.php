<?php

include('mysql.php');

include('simple_pdf_lip_signature.php'); 

$timekape_new = time() ;
$origine = "Lettre Infos Prealable" ;
$fichier_1 = $tititime."-".$numero_visite_calcule.$titime.".pdf"  ;

$query_11="INSERT INTO fichiers_dossiers_bkpe
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id."','".$origine."','".$fichier_1."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
 
 include('send_mail_lip.php');

?>