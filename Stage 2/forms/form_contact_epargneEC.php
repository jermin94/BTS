<html>
<head>
<title>E-courtier</title>
<meta name="Author" content="Th Lemaire">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000">

<?php
//******* introduction code bkpe   debut  *******
//***********************************************
//include('http://e-courtier.fr/bkpe/admin_courtier/mysql.php');
//include('../alertes_assurances/part_post_form_assurance_version_non_identifie.php');

include('../alertes_assurances/test_email_non_identifie.php');

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error());
mysql_select_db($db) or die ('Erreur :'.mysql_error());

$email=$_POST['email'];

try
{
	// On se connecte � MySQL
	$bdd = new PDO('');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
}

$timekape = time() ;
$dummy = "vide"  ;
$space_bkpe = "" ;
$id_partenaire = 1 ;
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
				Adresse Email non compl�t�e sur le formulaire<br><br>
				<br><br>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Se connecter </font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/oubli.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mot de passe oubli�</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center">&nbsp;</p>';
			}
			else if ($i==0)
			{
				$fiscal=$_POST['fiscal'];
				$niveau=$_POST['niveau'];
				$titre=$_POST['titre'];
				$Nom=$_POST['Nom'];
				$nom=$_POST['Nom'];
				$prenom=$_POST['Prenom'];
				$Prenom=$_POST['Prenom'];
				$adresse=$_POST['adresse'];
				$code=$_POST['code'];
				$ville=$_POST['ville'];
				$teldomicile=$_POST['teldomicile'];
				$telportable=$_POST['telportable'];
				$email=$_POST['email'];
				$epargne = $_POST['epargne'];
				$impot = $_POST['impot'];
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

				 mysql_query($query) or die('Error : '.mysql_error());
				 
				 mysql_close(); 
				 
				 
				 //#################################### JCRECO V2.1 ####################################################
				// MODIFIEZ ICI --------------------------

				$mailexp = "contact@e-courtier.fr"; // entrez ici votre email qui sera l'exp�diteur des recommandations
				$Email_retour = $_POST['email'];
				$mailcopie = "tlemaire@e-courtier.fr"; // entre ici l'email o� sera envoy� une copie de la recommandation
				$mailcopie1 = "lemair"; // entre ici l'email o� sera envoy� une copie de la recommandation
				$objet = "Form cgp"; // entrez ici l'objet du mail
				$siteweb = "http://e-courtier.fr"; // entrez ici l'url compl�te de votre site web avec http://

				//###################### NE PAS TOUCHER CI DESSOUS #####################################################
				$fiscal = $_POST['fiscal'];
				$ville = $_POST['ville'];
				 
				Mail("$mailcopie","Form EC epargne","  $fiscal     $niveau 

				Titre : $titre $Nom $Prenom
				Adresse : $adresse
				code : $code
				Tel $teldomicile       $telportable  

				Apport :  $impot 
				Email : $email\n
				Commentaires : $descriptiondubien


				\n mail","from: $mailexp")


				; 




				Mail("$Email_retour","Votre demande est prise en compte","Merci  $titre $Nom $Prenom,\n 
				Nous avons bien re�u votre message,
				Nous vous r�pondrons le plus rapidement possible.

				Restant � votre disposition,
				Thierry Lemaire
				Responsable du site 
				06 69 43 02 59


				Ce message a �t� envoy� automatiquement par contact@e-courtier.fr","from: $mailexp");


				//###################### FIN DU SCRIPT #################################################################
				 
				 //********************* envoi e mail  *****
				 
				 $to = "tlemaire@e-courtier.fr"   ;   
				$to_1 = $email ;


				$from = "tlemaire@e-courtier.fr" ; 




				$subject = "Vos besoins en epargne"; 

				$message = "&nbsp;&nbsp;Bonjour,&nbsp;&nbsp;".$prenom."  ".$nom."\n\n<div> &nbsp; </div>
				<div>Vous recherchez les meilleures solutions pour vos placements \n\n</div>
				<div>E-Courtier.fr compare et propose plusieurs solutions de nombreuses compagnies.\n\n</div>
				<div>
				<div>Vous pouvez d�s � pr�sent nous contacter au 09.50.45.28.98 ou consulter notre site.\n\n</div>
				<div>http://www.e-courtier.fr/vos-placements.html\n\n</div>
				\n\n
				<div>&nbsp;\n\n</div>
				<div>Votre espace membre est activ� � la page http://e-courtier.fr/espace-membres.html\n\n</div>
				<div>Votre login est : $email et votre mot de passe provisoire�: ".$mdp."\n\n</div>
				\n\n
				<div>&nbsp;\n\n</div>
				<div>Je reste � votre disposition</div>
				\n\n
				<div>Cordialement,</div>
				\n\n
				\n\n
				<div>&nbsp;\n\n</div>
				<div>En cas de difficult�s avec votre interlocuteur ou pour un compl�ment d�informations, \n\n</div>
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




				//******* introduction code bkpe   fin  *******
				//***********************************************
				
				echo '<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
				  <br>
				  Merci , un email a �t� envoy� <br><br>

				Veuillez v�rifier votre messagerie ou vos spams, un email de confirmation vous a �t� envoy� <br><br>

				  <br><br>

				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Se connecter </font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/oubli.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mot de passe oubli�</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>

				<p align="center">&nbsp;</p>';
			}
			else
			{
				echo'<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
				<br>
				Nous sommes d�sol�s, votre Adresse Email est d�j� connue. 
				<br><br>
				Afin de pouvoir nous envoyer votre demande, nous vous remercions de bien vouloir vous connecter � votre espace client.
				<br><br>
				Nous vous prions de bien vouloir nous excuser pour la g�ne occasionn�e.
				<br><br>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="http://e-courtier.fr"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Page d\'accueil </font></a></p>
				&nbsp; </font></b></p>
				<br>
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Se connecter </font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				
				<p align="center"> <a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/oubli.php"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mot de passe oubli�</font></a></p>
				 
				  &nbsp; </font></b></p>
				<br>
				<p align="center">&nbsp;</p>';
			}


?>




</body>
</html>
</body>
</html>