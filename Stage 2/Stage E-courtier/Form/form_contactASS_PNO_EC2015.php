<html>
<head>
<title>E-COURTIER.FR</title>
<meta name="Author" content="Th Lemaire">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000"> 
<? 
//#################################### JCRECO V2.1 ####################################################
// MODIFIEZ ICI --------------------------

$mailexp = "contact@e-courtier.fr"; // entrez ici votre email qui sera l'expéditeur des recommandations
$Email_retour = $HTTP_POST_VARS['email'];
$mailcopie = "vdeloison@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
$mailcopie1 = "tlemaire@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
$objet = "Form e-courtier.fr"; // entrez ici l'objet du mail
$siteweb = "http://e-courtier.fr"; // entrez ici l'url complète de votre site web avec http://

//###################### NE PAS TOUCHER CI DESSOUS #####################################################
$fiscal = $HTTP_POST_VARS['fiscal'];
$ville = $HTTP_POST_VARS['ville'];
$typebien = $HTTP_POST_VARS['typebien'];
 
Mail("$mailcopie","Form ec ASS PNO","Type :  $fiscal   qui concerne :  $niveau
Provenance : $provenance
Titre : $titre $Nom $Prenom 

Adresse propriétaire : $adresse
code : $code $villeP $ville
Tel $teldomicile       $telportable   
Email : $email\n

Adresse du bien 1 : $maison
$adpno $adcppno  $advillepno
superficie logement 1 : $mcarre1 
superficie logement 2 : $mcarre2 
superficie logement 3 : $mcarre3 
superficie logement 4 : $mcarre4 
superficie logement 5 : $mcarre5 
superficie logement 6 : $mcarre6 

dependance: $dependance 


Adresse du bien 2 : $maison1
$adpno1 $adcppno1  $advillepno1
superficie logement 1 : $mcarre12 
superficie logement 2 : $mcarre22 
superficie logement 3 : $mcarre32 
superficie logement 4 : $mcarre42 
superficie logement 5 : $mcarre52 
superficie logement 6 : $mcarre62 

dependance: $dependance1 

Adresse du bien 2 : $maison2
$adpno2 $adcppno2  $advillepno2
superficie logement 1 : $mcarre13 
superficie logement 2 : $mcarre23 
superficie logement 3 : $mcarre33 
superficie logement 4 : $mcarre43 
superficie logement 5 : $mcarre53 
superficie logement 6 : $mcarre63 

dependance: $dependance2

sinistre : $sinistre

date mise en place : $date_police

Commentaires : $descriptiondubien


\n $mail","from: $mailexp")
; 
Mail("$mailcopie1","Form ec ASS PNO","Type :  $fiscal   qui concerne :  $niveau
  Provenance : $provenance  
Titre : $titre $Nom $Prenom 

Adresse propriétaire : $adresse
code : $code $ville
Tel $teldomicile       $telportable   
Email : $email\n

Adresse du bien 1 : $maison
$adpno $adcppno  $advillepno
superficie logement 1 : $mcarre1 
superficie logement 2 : $mcarre2 
superficie logement 3 : $mcarre3 
superficie logement 4 : $mcarre4 
superficie logement 5 : $mcarre5 
superficie logement 6 : $mcarre6 

dependance: $dependance 


Adresse du bien 2 : $maison1
$adpno1 $adcppno1  $advillepno1
superficie logement 1 : $mcarre12 
superficie logement 2 : $mcarre22 
superficie logement 3 : $mcarre32 
superficie logement 4 : $mcarre42 
superficie logement 5 : $mcarre52 
superficie logement 6 : $mcarre62 

dependance: $dependance1 

Adresse du bien 2 : $maison2
$adpno2 $adcppno2  $advillepno2
superficie logement 1 : $mcarre13 
superficie logement 2 : $mcarre23 
superficie logement 3 : $mcarre33 
superficie logement 4 : $mcarre43 
superficie logement 5 : $mcarre53 
superficie logement 6 : $mcarre63 

dependance: $dependance2

sinistre : $sinistre

date mise en place : $date_police

Commentaires : $descriptiondubien


\n $mail","from: $mailexp")



; 




Mail("$Email_retour","Votre demande est prise en compte","Merci  $titre $Nom,\n 
Nous avons bien reçu votre message,
Nous vous répondrons le plus rapidement possible.

Restant à votre disposition,
Thierry Lemaire
Responsable du site e-courtier.fr



Ce message a été envoyé automatiquement par e-courtier.fr","from: $mailexp");


//###################### FIN DU SCRIPT #################################################################
?>
<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
  <br>
  Merci <?php echo $titre; ?> <?php echo $Nom; ?>, un email a été envoyé <br><br>

Si vous avez transmis votre adresse email, un message de confirmation vous a été adressé. <br><br>

  <br><br>

 
  &nbsp; </font></b></p>
<br>
<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d'accueil </font></a></p>
 
  &nbsp; </font></b></p>
<br>

<p align="center">&nbsp;</p>



<?php
//******* introduction code bkpe   debut  *******
//***********************************************
//include('http://e-courtier.fr/bkpe/admin_courtier/mysql.php');


$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error());
mysql_select_db($db) or die ('Erreur :'.mysql_error());


$timekape = time() ;
$dummy = "vide"  ;
$space_bkpe = "" ;
$id_partenaire = 40 ;
$mdp = $timekape ;
$message_3 = "site"  ;

$query="INSERT INTO clients
(id,timekape,timekape_last_modif,
m_mme_mlle,nom,prenom,
age,secteur_professionnel,adresse,
code_postal,ville,secteur,pays,
tel,portable,fax,email,
email2,mdp,offre_com_ok,id_partenaire,message_3)
VALUES ('NULL','".$timekape."','".$timekape."',
'".$m_mme_mlle."','".$Nom."','".$Prenom."',
'".$age."','".$secteur_prof."','".$adresse."',
'".$code."','".$ville."','".$secteur."','".$pays."',
'".$teldomicile."','".$telportable."','".$fax."','".$email."',
'".$dummy."','".$mdp."','".$offre_com_ok."','".$id_partenaire."','".$message_3."')" ;

 mysql_query($query) or die('Error 2 : '.mysql_error());		
		
		
$id_client = $id ;


$categorie = "pno";
 
 //  recuperation de l id du client et sauvegarde dans la table dossier_bkpe   debut  ******
//*********************************************************************************
//sleep(2); //repos 2 secondes
$result_1 = mysql_query("SELECT * FROM clients where   timekape ='$timekape'  ");
				$nbr_analyse=mysql_num_rows($result_1) ;
				if ( $nbr_analyse != "1" ) 
				{ $id_client = "0" ; }
				else
				{
				$row_kpe_1 = mysql_fetch_object ($result_1);
				$id_client=$row_kpe_1->id;
	
				}
		
	
$type_garantie = "PNO" ;
$titrel1 = $titrel1 ;
$Noml1 = $Noml1 ;
$Prenoml1 = $Prenoml1 ;
$datel1 = $datel1 ;
$profl1 = $profl1 ;
$type_contratl1 = $type_contratl1 ;
$revenusl1 = $revenusl1 ;
$titrel2 = $titrel2 ;
$Noml2 = $Noml2 ;
$Prenoml2 =$Prenoml2 ;
$datel2 = $datel2 ;
$profl2 = $profl2 ;
$type_contratl2 = $type_contratl2 ;
$revenusl2 = $revenusl2 ;
$revenusautres1 = $revenusautres1 ;
$revenusautres2 = $revenusautres2 ;
$mrevenusautres1 = $mrevenusautres1 ;
$mrevenusautres2 = $mrevenusautres2 ;
$loyer = $loyer ;
$charges = $charges ;
$date_bail = $date_bail ;
$date_police = $date_police ;
$adresseb = $adresseb ;
$adresse2b = $adresse2b ;
$codeb = $codeb ;
$villeb = $villeb ;
$prix = $prix ;
$fiscal = $fiscal ;
$niveau = $niveau ;
$unpi = $unpi ;
$maison = $maison ;
$adpno = $adpno ;
$adcppno = $adcppno ;
$advillepno = $advillepno ;
$dependance = $dependance ;
$sinistre = $sinistre ;
	 
	$query_11="INSERT INTO dossiers_bkpe
(id,timekape,timekape_last_modif,id_client,id_partenaire,categorie,statut,message,type_garantie,titrel1,Noml1,Prenoml1,datel1,profl1,type_contratl1,revenusl1,titrel2,Noml2,Prenoml2,datel2,profl2,type_contratl2,revenusl2,revenusautres1,mrevenusautres1,revenusautres2,mrevenusautres2,loyer,charges,date_bail,date_police,adresseb,adresse2b,codeb,villeb,prix,maison,adpno,adcppno,advillepno,mcarre1,mcarre2,mcarre3,mcarre4,mcarre5,mcarre6,dependance,sinistre)
VALUES ('NULL','".$timekape."','".$timekape."','".$id_client."','".$id_partenaire."','".$categorie."','".$statut."','".$message."','".$type_garantie."','".$titrel1."','".$Noml1."','".$Prenoml1."','".$datel1."','".$profl1."','".$type_contratl1."','".$revenusl1."','".$titrel2."','".$Noml2."','".$Prenoml2."','".$datel2."','".$profl2."','".$type_contratl2."','".$revenusl2."','".$revenusautres1."','".$mrevenusautres1."','".$revenusautres2."','".$mrevenusautres2."','".$loyer."','".$charges."','".$date_bail."','".$date_police."','".$adresseb."','".$adresse2b."','".$codeb."','".$villeb."','".$prix."','".$maison."','".$adpno."','".$adcppno."','".$advillepno."','".$mcarre1."','".$mcarre2."','".$mcarre3."','".$mcarre4."','".$mcarre5."','".$mcarre6."','".$dependance."','".$sinistre."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());		
		
		
		
		
		
 
 mysql_close(); 
 
 //********************* envoi e mail  *****
 
 $to = "tlemaire@e-courtier.fr"   ;   
$to_1 = $email ;


$from = "contact@e-courtier.fr" ; 



$subject = "Nouvelle inscription sur le site e-courtier"; 

$message = "&nbsp;&nbsp;Bonjour,\n\n<div> &nbsp; </div>
<div>Nous avons bien reçu votre demande. \n\n</div>
<div>La personne qui s’occupe de votre demande va vous contacter le plus rapidement possible. \n\n</div>
<div>Afin de communiquer directement avec la personne qui gère votre dossier,\n\n</div>
<div>pour lui transmettre des fichiers ou suivre vos dossiers en cours,\n\n</div>
<div>nous vous remercions de vous identifier sur notre site http://e-courtier.fr\n\n</div>
<div>Votre login est : ".$email." \n\n</div>
<div>Votre mot de passe confidentiel et provisoire est :  ".$mdp." \n\n</div>
<div>Merci de ne pas répondre à ce message envoyé automatiquement \n\n</div>
<div>Restant à votre disposition, \n\n</div>
<div>e-courtier.fr \n\n</div>
<div>09.50.45.28.98 (box, appel local) \n\n</div>
<div>Fax : 09.72.12.89.66 \n\n</div>
\n\n<div> &nbsp; </div>
<div>-----------------------</div>

\n\n";


// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;


// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;

// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;

// attachment
$headers .= "--".$separator.$eol;
$headers .= "--".$separator."--";

// send message


 mail($to, $subject, "", $headers);
 
 mail($to_1, $subject, "", $headers);




//******* introduction code bkpe   fin  *******
//***********************************************



?>










</body>
</html>