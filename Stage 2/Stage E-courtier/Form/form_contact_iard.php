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
$mailcopie = "lemaire.t@free.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
$mailcopie1 = "tlemaire@e-courtier.fr"; // entre ici l'email où sera envoyé une copie de la recommandation
$objet = "Form e-courtier.fr"; // entrez ici l'objet du mail
$siteweb = "http://e-courtier.fr"; // entrez ici l'url complète de votre site web avec http://

//###################### NE PAS TOUCHER CI DESSOUS #####################################################
$fiscal = $HTTP_POST_VARS['fiscal'];
$ville = $HTTP_POST_VARS['ville'];
$typebien = $HTTP_POST_VARS['typebien'];
 
 
 
 
 
Mail("$mailcopie","Form e-courtier.fr iARD","Type :  $fiscal   qui concerne :  $niveau

Titre : $titre $Nom $Prenom 
$pieces : pieces Dépendances : $dependance  
Adresse : $adresse
code : $code $ville
Tel $teldomicile       $telportable   
Email : $email\n
Commentaires : $descriptiondubien


\n $mail","from: $mailexp")
; 
Mail("$mailcopie1","Form e-courtier.fr IARD","Type :  $fiscal   qui concerne :  $niveau
    

Titre : $titre $Nom $Prenom 
Type d'habitation $maison $pieces : pieces Dépendances : $dependance  
Adresse : $adresse
code : $code $ville
Tel $teldomicile       $telportable   
Email : $email\n
Commentaires : $descriptiondubien



\n $mail","from: $mailexp")



; 




Mail("$Email_retour","Votre demande est prise en compte","Merci  $titre $Nom,\n 
Nous avons bien reçu votre message,
Nous vous répondrons le plus rapidement possible.

Restant à votre disposition,
Thierry Lemaire
Responsable du site e-courtier.fr
06 69 43 02 59


Ce message a été envoyé automatiquement par e-courtier.fr","from: $mailexp");





//###################### FIN DU SCRIPT #################################################################
?>
<p align="center"><b><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br>
  <br>
  Merci <?php echo $titre; ?> <?php echo $Nom; ?>, un email a été envoyé <br><br>

Veuillez vérifier votre messagerie ou vos spams, un email de confirmation vous a été envoyé <br><br>

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
$id_partenaire = 1 ;
$mdp = $timekape ;

$reponse1 = $bdd->query('select email from clients where email="'.$email.'"');
	 if ($reponse1->fetch() == false)
    {
        $query="INSERT INTO clients
		(id,timekape,timekape_last_modif,
		m_mme_mlle,nom,prenom,
		age,secteur_professionnel,adresse,
		code_postal,ville,secteur,pays,
		tel,portable,fax,email,
		email2,mdp,offre_com_ok,id_partenaire,message_1,message_2,message_3)
		VALUES ('NULL','".$timekape."','".$timekape."',
		'".$titre."','".$Nom."','".$Prenom."',
		'".$age."','".$secteur_prof."','".$adresse."',
		'".$code."','".$ville."','".$secteur."','".$pays."',
		'".$teldomicile."','".$telportable."','".$fax."','".$email."',
		'".$dummy."','".$mdp."','".$offre_com_ok."','".$id_partenaire."','".$message_1."','".$message_2."','".$message_3."')" ;
		  
		 mysql_query($query) or die('Error : '.mysql_error());
    }
	$reponse1->CloseCursor();
 $categorie = "assurance";
 
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
(id,timekape,timekape_last_modif,id_client,id_partenaire,categorie,statut,message,type_garantie,titrel1,Noml1,Prenoml1,datel1,profl1,type_contratl1,revenusl1,titrel2,Noml2,Prenoml2,datel2,profl2,type_contratl2,revenusl2,revenusautres1,mrevenusautres1,revenusautres2,mrevenusautres2,loyer,charges,date_bail,date_police,adresseb,adresse2b,codeb,villeb,prix,apport_e,epargne,niveau,fiscal)
VALUES ('NULL','".$timekape."','".$timekape."','".$id_client."','".$id_partenaire."','".$categorie."','".$statut."','".$message."','".$type_garantie."','".$titrel1."','".$Noml1."','".$Prenoml1."','".$datel1."','".$profl1."','".$type_contratl1."','".$revenusl1."','".$titrel2."','".$Noml2."','".$Prenoml2."','".$datel2."','".$profl2."','".$type_contratl2."','".$revenusl2."','".$revenusautres1."','".$mrevenusautres1."','".$revenusautres2."','".$mrevenusautres2."','".$loyer."','".$charges."','".$date_bail."','".$date_police."','".$adresseb."','".$adresse2b."','".$codeb."','".$villeb."','".$prix."','".$apport_e."','".$epargne."','".$niveau."','".$fiscal."')" ;
		

  
 mysql_query($query) or die('Error : '.mysql_error());


//  recuperation de l id du client et sauvegarde dans la table alerte_assurances_bkpe   fin  ******
//*********************************************************************************
 
 
 
 
 
 
 
 
 mysql_close(); 
 
 //********************* envoi e mail  *****
 
 $to = "tlemaire@e-courtier.fr"   ;   
$to_1 = $email ;


$from = "tlemaire@e-courtier.fr" ; 




$subject = "Vos besoins en assurances"; 

$message = "&nbsp;&nbsp;Bonjour,&nbsp;&nbsp;".$prenom."  ".$nom."\n\n<div> &nbsp; </div>
<div>Vous recherchez les meilleures solutions pour vos assurances. \n\n</div>
<div>E-Courtier.fr compare et propose plusieurs solutions de nombreuses compagnies d assurances.\n\n</div>
<div>
<div>Vous pouvez dès à présent nous contacter au 09.50.45.28.98 ou consulter notre site.\n\n</div>
<div>http://e-courtier.fr/vos-assurances-moins-cheres.html\n\n</div>
\n\n
<div>&nbsp;\n\n</div>
<div>Votre espace membre est activé à la page http://e-courtier.fr/espace-membres.html\n\n</div>
<div>Votre login est : $email et votre mot de passe provisoire : ".$mdp."\n\n</div>
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




//******* introduction code bkpe   fin  *******
//***********************************************



?>




</body>
</html>