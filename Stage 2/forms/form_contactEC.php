<html>
<head>
<title>E-COURTIER.FR</title>
<meta name="Author" content="Th Lemaire">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000"> 
<?php
//******* introduction code bkpe   debut  *******
//***********************************************
//include('http://e-courtier.fr/bkpe/admin_courtier/mysql.php');



				$query="INSERT INTO clients
				(id,timekape,timekape_last_modif,
				m_mme_mlle,nom,prenom,
				age,secteur_professionnel,adresse,
				code_postal,ville,secteur,pays,
				tel,portable,fax,email,
				email2,mdp,offre_com_ok,id_partenaire)
				VALUES ('NULL','".$timekape."','".$timekape."',
				'".$titre."','".$Nom."','".$Prenom."',
				'NULL','NULL','".$adresse."',
				'".$code."','".$ville."','NULL','NULL',
				'".$teldomicile."','".$telportable."','NULL','".$email."',
				'".$dummy."','".$mdp."','NULL','".$descriptiondubien."')" ;
				  
				 mysql_query($query) or die('Error : '.mysql_error());
				 
				 mysql_close(); 
				 //#################################### JCRECO V2.1 #################################################### 
				 //********************* envoi e mail  *****
				 
				 $to = "tlemaire@e-courtier.fr"   ;   
				$to_1 = $email ;


				$from = "tlemaire@e-courtier.fr" ; 



				$subject = "Nouvelle inscription sur le site e-courtier"; 

				$message = "&nbsp;&nbsp;Bonjour $titre $Nom $Prenom,\n\n<div> &nbsp; </div>
				<div>Nous avons bien re�u votre demande. \n\n</div>
				<div>La personne qui s�occupe de votre demande va vous contacter le plus rapidement possible. \n\n</div>
				<div>Afin de communiquer directement avec la personne qui g�re votre dossier,\n\n</div>
				<div>pour lui transmettre des fichiers ou suivre vos dossiers en cours,\n\n</div>
				<div>nous vous remercions de vous identifier sur notre site http://e-courtier.fr/espace-membres.html\n\n</div>
				<div>Votre login est�: ".$email." \n\n</div>
				<div>Votre mot de passe confidentiel et provisoire est�:  ".$mdp." \n\n</div>
				<div>Merci de ne pas r�pondre � ce message envoy� automatiquement \n\n</div>
				<div>Restant � votre disposition, \n\n</div>
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