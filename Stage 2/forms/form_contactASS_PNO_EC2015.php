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

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error());
mysql_select_db($db) or die ('Erreur :'.mysql_error());

$email=$_POST['email'];

try
{
	// On se connecte à MySQL
	$bdd = new PDO('');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catchs(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$timekape = time() ;
$dummy = "vide"  ;
$space_bkpe = "" ;
$id_partenaire = 40 ;
$mdp = $timekape ;
$message_3 = "site"  ;
$i=0;

$reponse1 = $bdd->query('SELECT * FROM `clients` WHERE email="'.$email.'"');
	 if ($reponse1->fetch() == true)
    {
       $i=$i+1;
    }
	$reponse1->CloseCursor();

		if(empty($_POST['email']))
			{
				echo'<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
				<br>
				Adresse Email non complétée sur le formulaire<br><br>
				<br><br>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Se connecter </font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/oubli.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mot de passe oublié</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center">&nbsp;</p>';
			}
			else if ($i==0)
			{
				$fiscal = $_POST['fiscal'];
				$ville = $_POST['ville'];
				$Nom=$_POST['Nom'];
				$Nom= strtoupper($Nom);
				$Prenom=$_POST['Prenom'];
				$teldomicile = $_POST['teldomicile'];
				$telportable = $_POST['telportable'];
				$titre=$_POST['titre'];
				$adresse = $_POST['adresse'];
				$code = $_POST['code'];
				$ville= strtoupper($ville);
				$type_garantie = "PNO" ;
				$date_police = $_POST['date_police'] ;
				$maison = $_POST['maison'] ;
				$adpno = $_POST['adpno'] ;
				$adcppno = $_POST['adcppno'] ;
				$advillepno = $_POST['advillepno'] ;
				$mcarre1 = $_POST['mcarre1'];
				$mcarre2 = $_POST['mcarre2'];
				$mcarre3 = $_POST['mcarre3'];
				$mcarre4 = $_POST['mcarre4'];
				$mcarre5 = $_POST['mcarre5'];
				$mcarre6 = $_POST['mcarre6'];
				$dependance = $_POST['dependance'] ;
				$maison1 = $_POST['maison'] ;
				$adpno1 = $_POST['adpno'] ;
				$adcppno1 = $_POST['adcppno'] ;
				$advillepno1 = $_POST['advillepno'] ;
				$mcarre12 = $_POST['mcarre1'];
				$mcarre22 = $_POST['mcarre2'];
				$mcarre32 = $_POST['mcarre3'];
				$mcarre42 = $_POST['mcarre4'];
				$mcarre52 = $_POST['mcarre5'];
				$mcarre62 = $_POST['mcarre6'];
				$dependance1 = $_POST['dependance'] ;
				$maison2 = $_POST['maison'] ;
				$adpno2 = $_POST['adpno'] ;
				$adcppno2 = $_POST['adcppno'] ;
				$advillepno2 = $_POST['advillepno'] ;
				$mcarre13 = $_POST['mcarre1'];
				$mcarre23 = $_POST['mcarre2'];
				$mcarre33 = $_POST['mcarre3'];
				$mcarre43 = $_POST['mcarre4'];
				$mcarre53 = $_POST['mcarre5'];
				$mcarre63 = $_POST['mcarre6'];
				$dependance2 = $_POST['dependance'] ;
				$sinistre = $_POST['sinistre'] ;
				$categorie = "pno";
				$email=$_POST['email'];
				$descriptiondubien=$_POST['descriptiondubien'];
				
				$query="INSERT INTO clients
				(id,timekape,timekape_last_modif,
				m_mme_mlle,nom,prenom,
				age,secteur_professionnel,adresse,
				code_postal,ville,secteur,pays,
				tel,portable,fax,email,
				email2,mdp,offre_com_ok,id_partenaire,message_3)
				VALUES ('NULL','".$timekape."','".$timekape."',
				'".$titre."','".$Nom."','".$Prenom."',
				'NULL','NULL','".$adresse."',
				'".$code."','".$ville."','NULL','NULL',
				'".$teldomicile."','".$telportable."','NULL','".$email."',
				'".$dummy."','".$mdp."','NULL','".$id_partenaire."','".$descriptiondubien."')" ;

				 mysql_query($query) or die('Error 2 : '.mysql_error());		
						
				 
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
				
					 
					$query_11="INSERT INTO dossiers_bkpe
				(id,timekape,timekape_last_modif,id_client,id_partenaire,categorie,statut,message,type_garantie,titrel1,Noml1,Prenoml1,datel1,profl1,type_contratl1,revenusl1,titrel2,Noml2,Prenoml2,datel2,profl2,type_contratl2,revenusl2,revenusautres1,mrevenusautres1,revenusautres2,mrevenusautres2,loyer,charges,date_bail,date_police,adresseb,adresse2b,codeb,villeb,prix,maison,adpno,adcppno,advillepno,mcarre1,mcarre2,mcarre3,mcarre4,mcarre5,mcarre6,dependance,sinistre)
				VALUES ('NULL','".$timekape."','".$timekape."','".$id_client."','".$id_partenaire."','".$categorie."','NULL','".$descriptiondubien."','".$type_garantie."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','".$date_police."','NULL','NULL','NULL','NULL','NULL','".$maison."','".$adpno."','".$adcppno."','".$advillepno."','".$mcarre1."','".$mcarre2."','".$mcarre3."','".$mcarre4."','".$mcarre5."','".$mcarre6."','".$dependance."','".$sinistre."')" ;
				  
				 mysql_query($query_11) or die('Error 2 : '.mysql_error());		
						
						
						
						
						
				 
				 mysql_close(); 
				
				//#################################### JCRECO V2.1 ####################################################
				// MODIFIEZ ICI --------------------------

				$mailexp = "contact@e-courtier.fr"; // entrez ici votre email qui sera l'expéditeur des recommandations
				$Email_retour = $_POST['email'];
				$mailcopie = "vdeloison@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
				$mailcopie1 = "tlemaire@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
				$objet = "Form e-courtier.fr"; // entrez ici l'objet du mail
				$siteweb = "http://e-courtier.fr"; // entrez ici l'url complète de votre site web avec http://

				//###################### NE PAS TOUCHER CI DESSOUS #####################################################
				$fiscal = $_POST['fiscal'];
				$ville = $_POST['ville'];
				 
				Mail("$mailcopie","Form ec ASS PNO","Type :  $fiscal
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


				\n mail","from: $mailexp")
				; 
				Mail("$mailcopie1","Form ec ASS PNO","Type :  $fiscal
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


				\n mail","from: $mailexp")



				; 




				Mail("$Email_retour","Votre demande est prise en compte","Merci  $titre $Nom,\n 
				Nous avons bien reçu votre message,
				Nous vous répondrons le plus rapidement possible.

				Restant à votre disposition,
				Thierry Lemaire
				Responsable du site e-courtier.fr



				Ce message a été envoyé automatiquement par e-courtier.fr","from: $mailexp");


				###################### FIN DU SCRIPT #################################################################
				
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

				echo '<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
				<br>
				Merci <?php echo $titre; ?> <?php echo $Nom; ?>, un email a été envoyé <br><br>

				Si vous avez transmis votre adresse email, un message de confirmation vous a été adressé. <br><br>

				<br><br>

			 
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
			 
				&nbsp; </font></b></p>
				<br>

				<p align="center">&nbsp;</p>';
			}
			else
			{
					echo'<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
					<br>
					Nous sommes désolés, votre Adresse Email est déjà connue. 
					<br><br>
					Afin de pouvoir nous envoyer votre demande, nous vous remercions de bien vouloir vous connecter à votre espace client.
					<br><br>
					Nous vous prions de bien vouloir nous excuser pour la gêne occasionnée.
					<br><br>
				 
					&nbsp; </font></b></p>
					<br>
					<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
				 
					&nbsp; </font></b></p>
					<br>
					
					<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Se connecter </font></a></p>
				 
					&nbsp; </font></b></p>
					<br>
					
					<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/oubli.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mot de passe oublié</font></a></p>
					 
					&nbsp; </font></b></p>
					<br>

					<p align="center">&nbsp;</p>';
			}
			


//******* introduction code bkpe   fin  *******
//***********************************************



?>










</body>
</html>