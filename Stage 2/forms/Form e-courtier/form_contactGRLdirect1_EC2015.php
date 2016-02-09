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



$email=$_POST['email'];

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=;dbname=', '', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$fiscal=$_POST['fiscal'];
$timekape = time() ;
$dummy = "vide"  ;
$space_bkpe = "" ;
$id_partenaire = 1 ;
$message_3 = "site direct" ;
$message_2 = $fiscal ;
$message_1 = "via le site2" ;
$mdp = $timekape ;
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
				$titre=$_POST['titre'];
				$ville= strtoupper($ville);
				$timekape = time() ;
				$dummy = "vide"  ;
				$space_bkpe = "" ;
				$id_partenaire = 1 ;
				$message_3 = "site direct" ;
				$message_2 = $fiscal ;
				$message_1 = "via le site2" ;
				$mdp = $timekape ;
				$type_garantie = "grl" ;
				$categorie = "grl-gli";
				$adresse = $_POST['adresse'];
				$code = $_POST['code'];
				$teldomicile = $_POST['teldomicile'];
				$telportable = $_POST['telportable'];
				$titrel1 = $_POST['titrel1'] ;
				$Noml1 = $_POST['Noml1'] ;
				$Prenoml1 = $_POST['Prenoml1'] ;
				$datel1 = $_POST['datel1'] ;
				$profl1 = $_POST['profl1'] ;
				$type_contratl1 = $_POST['type_contratl1'] ;
				$revenusl1 = $_POST['revenusl1'] ;
				$titrel2 = $_POST['titrel2'] ;
				$Noml2 = $_POST['Noml2'] ;
				$Prenoml2 =$_POST['Prenoml2'] ;
				$datel2 = $_POST['datel2'] ;
				$profl2 = $_POST['profl2'] ;
				$type_contratl2 = $_POST['type_contratl2'] ;
				$revenusl2 = $_POST['revenusl2'] ;
				$revenusautres1 = $_POST['revenusautres1'] ;
				$revenusautres2 = $_POST['revenusautres2'] ;
				$loyer = $_POST['loyer'] ;
				$charges = $_POST['charges'] ;
				$date_bail = $_POST['date_bail'] ;
				$date_police = $_POST['date_police'] ;
				$adresseb = $_POST['adresseb'] ;
				$adresse2b = $_POST['adresse2b'] ;
				$codeb = $_POST['codeb'] ;
				$villeb = $_POST['villeb'] ;
				$unpi = $_POST['unpi'] ;
				
				
				$query="INSERT INTO clients
				(id,timekape,timekape_last_modif,
				m_mme_mlle,nom,prenom,
				age,secteur_professionnel,adresse,
				code_postal,ville,secteur,pays,
				tel,portable,fax,email,
				email2,mdp,offre_com_ok,id_partenaire,message_1,message_2,message_3)
				VALUES ('NULL','".$timekape."','".$timekape."',
				'".$titre."','".$Nom."','".$Prenom."',
				'NULL','NULL','".$adresse."',
				'".$code."','".$ville."','NULL','NULL',
				'".$teldomicile."','".$telportable."','NULL','".$email."',
				'".$dummy."','".$mdp."','NULL','".$id_partenaire."','NULL','NULL','NULL')" ;
				  
				 mysql_query($query) or die('Error : '.mysql_error());
				 
				 
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
						
						
				$query="INSERT INTO dossiers_bkpe
				(id,timekape,timekape_last_modif,id_client,id_partenaire,categorie,statut,message,type_garantie,titrel1,Noml1,Prenoml1,datel1,profl1,type_contratl1,revenusl1,titrel2,Noml2,Prenoml2,datel2,profl2,type_contratl2,revenusl2,revenusautres1,mrevenusautres1,revenusautres2,mrevenusautres2,loyer,charges,date_bail,date_police,adresseb,adresse2b,codeb,villeb,prix,provenance)
				VALUES ('NULL','".$timekape."','".$timekape."','".$id_client."','".$id_partenaire."','NULL','NULL','NULL','NULL','".$titrel1."','".$Noml1."','".$Prenoml1."','".$datel1."','".$profl1."','".$type_contratl1."','".$revenusl1."','".$titrel2."','".$Noml2."','".$Prenoml2."','".$datel2."','".$profl2."','".$type_contratl2."','".$revenusl2."','".$revenusautres1."','NULL','".$revenusautres2."','NULL','".$loyer."','".$charges."','".$date_bail."','".$date_police."','".$adresseb."','".$adresse2b."','".$codeb."','".$villeb."','NULL','NULL')" ;
				  
				 mysql_query($query) or die('Error : '.mysql_error());
				 
				 mysql_close(); 
				 
				 //#################################### JCRECO V2.1 ####################################################
				// MODIFIEZ ICI --------------------------

				$mailexp = "contact@e-courtier.fr"; // entrez ici votre email qui sera l'expéditeur des recommandations
				$Email_retour = $_POST['email'];
				$mailcopie = "lemaire.t@free.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
				$mailcopie1 = "tlemaire@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
				$objet = "Form GRL Direct"; // entrez ici l'objet du mail
				$siteweb = "http://e-courtier.fr"; // entrez ici l'url complète de votre site web avec http://

				//###################### NE PAS TOUCHER CI DESSOUS #####################################################




				$fiscal = $_POST['fiscal'];
				$ville = $_POST['ville'];
				$Nom= strtoupper($Nom);$ville= strtoupper($ville);
				Mail("$mailcopie","Form GRL direct ","Type :  $fiscal    Adhérent UNPI : $unpi

				Informations sur le bailleur :
				Titre : $titre $Nom $Prenom
				Adresse : $adresse
				code : $code $ville
				Tel $teldomicile       $telportable   
				Email : $email\n

				Locataire 1 : $titrel1 $Noml1 $Prenoml1 
				date de naissance : $datel1
				Profession : $profl1  Type contrat : $type_contratl1  Revenus : $revenusl1

				Locataire 2 : $titrel2 $Noml2 $Prenoml2 
				date de naissance : $datel2
				Profession : $profl2  Type contrat : $type_contratl2  Revenus : $revenusl2

				Revenus autres : $revenusautres1
				Revenus autres 2 : $revenusautres2 

				Loyer : $loyer
				charges : $charges

				Date début du bail : $date_bail
				Date mise en place police :        $date_police

				Adresse du bien : $adresseb
				Adresse 2 du bien : $adresse2b
				code postal du bien : $codeb  ville du bien : $villeb


				\n mail","from: $mailexp")
				; 
				Mail("$mailcopie1","Form GRL direct ","Type :  $fiscal    Adhérent UNPI : $unpi

				Informations sur le bailleur :
				Titre : $titre $Nom $Prenom
				Adresse : $adresse
				code : $code $ville
				Tel $teldomicile       $telportable   
				Email : $email\n

				Locataire 1 : $titrel1 $Noml1 $Prenoml1 
				date de naissance : $datel1
				Profession : $profl1  Type contrat : $type_contratl1  Revenus : $revenusl1

				Locataire 2 : $titrel2 $Noml2 $Prenoml2 
				date de naissance : $datel2
				Profession : $profl2  Type contrat : $type_contratl2  Revenus : $revenusl2

				Revenus autres : $revenusautres1
				Revenus autres 2 : $revenusautres2 

				Loyer : $loyer
				charges : $charges

				Date début du bail : $date_bail
				Date mise en place police :        $date_police

				Adresse du bien : $adresseb
				Adresse 2 du bien : $adresse2b
				code postal du bien : $codeb  ville du bien : $villeb



				\n mail","from: $mailexp")



				; 



				Mail("$Email_retour","Votre demande est prise en compte","Merci  $titre $Nom $Prenom,\n 

				Vous êtes sur le point de demander de l'information ou de souscrire une garantie contre les loyers impayés.

				Une fois les informations concernant votre locataire reçues, nous vous contacterons pour vous indiquer le coût de cette garantie et eventuellement nous finaliserons votre contrat au plus vite.

				Nous vous proposerons alors de régler par carte bancaire ou par prélevements automatiques.

				Si vous optez pour le prélevement, nous vous remercions de préparer le RIB sur lequel ces prélevements seront effectués.



				Restant à votre disposition,
				Thierry Lemaire
				Responsable du site e-courtier.fr
				06 69 43 02 59

				Pour joindre le standard, coût d'un appel local, 09.50.45.28.98


				Ce message a été envoyé automatiquement par e-courtier.fr","from: $mailexp");



				//###################### FIN DU SCRIPT #################################################################
				 
				 //********************* envoi e mail  *****
				 
				$to = "tlemaire@e-courtier.fr"   ;   
				$to_1 = $email ;


				$from = "contact@e-courtier.fr" ; 



				$subject = "Vos besoins en assurances"; 

				$message = "&nbsp;&nbsp;Bonjour $titre $Nom $Prenom,\n\n<div> &nbsp; </div>
				<div>Vous recherchez les meilleures solutions d’assurances. \n\n</div>
				<div>E-Courtier.fr compare et propose plusieurs solutions de nombreuses compagnies d’assurances.\n\n</div>
				<div>
				<div>Vous pouvez dès à présent nous contacter au 09.50.45.28.98 ou consulter notre site.\n\n</div>
				<div>http://e-courtier.fr/vos-assurances-moins-cheres.html\n\n</div>
				\n\n
				<div>&nbsp;\n\n</div>
				<div>Votre espace membre est activé à la page http://e-courtier.fr/espace-membres.html\n\n</div>
				<div>Votre login est votre adresse email et votre mot de passe provisoire : ".$mdp."\n\n</div>
				\n\n
				<div>&nbsp;\n\n</div>
				<div>Je reste à votre disposition</div>
				\n\n
				<div>Cordialement,</div>
				\n\n
				\n\n
				<div>&nbsp;\n\n</div>
				<div>En cas de difficultés avec votre interlocuteur ou pour un complément d’informations, \n\n</div>
				<div>vous pouvez contacter serviceclients@e-courtier.fr\n\n</div>
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

				echo '<p align="center"><b><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><br> 
				  <br> 

				Merci , Nous vous remercions de votre demande, un email de confirmation vous a été envoyé <br><br>

				Vous serez contacté rapidement sous 24h <br><br>

				  <br><br>

				<div class="fb-like" data-href="http://www.facebook.com/ECourtier.fr" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>


				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr/assurance-loyers-impayes.html"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Retour à la page Loyers Impayés</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>

				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Retour à l\'accueil du site</font></a></p>
				 
				  &nbsp; </font></b>

				<p align="center">&nbsp;</p>';
			}
			else 
			{
			echo '<p align="center"><b><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><br> 
				  <br> 

				Nous sommes désolés, votre Adresse Email est déjà connue. 
				<br><br>
				Afin de pouvoir nous envoyer votre demande, nous vous remercions de bien vouloir vous connecter à votre espace client.
				<br><br>
				Nous vous prions de bien vouloir nous excuser pour la gêne occasionnée.
				<br><br>


				<div class="fb-like" data-href="http://www.facebook.com/ECourtier.fr" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>


				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr/assurance-loyers-impayes.html"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Retour à la page Loyers Impayés</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>

				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Retour à l\'accueil du site</font></a></p>
				 
				  &nbsp; </font></b>
				
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