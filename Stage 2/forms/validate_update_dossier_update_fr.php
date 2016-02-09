<html>

<head>

<title>E-COURTIER.FR</title>

<meta name="Author" content="Th Lemaire">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body> 
<?php
define('MyPHPForum',true);
  
include('mysql.php');
include('config.inc.php');
//include("includes/fonction.sys.php");
include('fonctions.php');
  
include('headers_sans_image_fr.php');


include_once("fckeditor/fckeditor.php") ;


//if(!isset($_SESSION["_pseudo"]) || !isset($_SESSION["_mdp"]))
if((!isset($_COOKIE["myforum_login_guides1"]))OR(!isset($_COOKIE["myforum_pass_guides1"])))
{
  echo "<center><br><br>Vous devez vous identifier pour accéder à cette page</center>";
  exit();
}
else
{
 

  //Si on est bien loguer, on affiche le reste
  $pseudo = mysqlsafe($_SESSION['_pseudo']);
  $mdp = mysqlsafe($_SESSION['_mdp']);
  
  
  

  echo '<div class="conteiner">';
  echo '<br><br>Suivi de  <b>'.safest($_SESSION['_pseudo']).'</b>';
  
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>
<!-- ************************************* -->
<!-- ************************************* -->

<STYLE type="text/css" >

.bkpe_annonce_input	{
	margin-top:0px;
	width:420px;
	float:left;
   	padding-top:4px;
}


.bkpe_annonce_etiquette	{
	margin:2px 5px 0 0;
	padding:0;
	width:360px;
   	font-size:14px;
   	text-align:right;
	float:left;
   	font-weight:bold;
  	padding-top:4px;
}

#color_error_mention
{
/*font-family:Verdana, Arial, sans-serif;*/
	font-weight:bold;
	font-style:normal;
	color:red;
}

</STYLE>






<!-- **************************************** -->
<!-- **************************************** -->  
  
  
&nbsp &nbsp &nbsp &nbsp  <a href="./"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;&nbsp 


&nbsp;Accueil </a>
 <a href="./gestion_dossier.php"> &nbsp;&nbsp;&nbsp;&nbsp;
 
 <img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Gerer les Dossier en cours</a><br><br>
 
 
 <?php
  

//*************************************
//************ debut corps du traitement ******
//****************************************
//****************************************


$test_input_ok = "ok" ;
$test_input_ok1 = "ok" ;
$url_bkpe = $_SERVER['REQUEST_URI'] ;

// Fonction qui supprimer de nombreux caractères accentués
function suppr_accents($str)
{
  $avant = array('À','Á','Â','Ã','Ä','Å','A','A','A','A','A','Æ','A',
'Ç','C','C','C','C','Ð','D','Ð',
'É','È','Ê','Ë','E','E','E','E','E','G','G','G','G',
'H','H','Ì','Í','Î','Ï','I','I','I','I','I','l','l','l','l','l','I','IJ','J','K','L','L','L','L','L',
'N','N','N','Ñ','Ò','Ó','Ô','Õ','Ö','O','O','O','O','O','Ø','O','Œ','R','R','R',
'S','S','S','Š','T','T','T','U','Ù','Ú','Û','Ü','U','U','U','U','U','U','U','U','U','U','U',
'W','Ý','Y','Ÿ','Z','Z','Ž',
'à','á','â','ã','ä','å','a','a','a','a','a','æ','ae','ç','c','c','c','c','d','d',
'è','é','ê','ë','e','e','e','e','e','g','g','g','g','h','h',
'ì','í','î','ï','i','i','i','i','i','i','ij','j','k',
'ñ','n','n','n','n','ò','ó','ô','õ','ö','o','o','o','o','o','ø','o','œ',
'r','r','r','s','s','s','š','ß','t','t','t',
'ù','ú','û','ü','u','u','u','u','u','u','u','u','u','u','u','u','w','ý','ÿ','y','z','z','ž','ƒ','s');
  $apres = array('A','A','A','A','A','A','A','A','A','A','A','AE','AE',
'C','C','C','C','C','D','D','D',
'E','E','E','E','E','E','E','E','E','G','G','G','G',
'H','H','I','I','I','I','I','I','I','I','I','I','I','I','I','I','I','IJ','J','K','L','L','L','L','L',
'N','N','N','N','O','O','O','O','O','O','O','O','O','O','O','O','OE','R','R','R',
'S','S','S','S','T','T','T','U','U','U','U','U','U','U','U','U','U','U','U','U','U','U','U',
'W','Y','Y','Y','Z','Z','Z',
'a','a','a','a','a','a','a','a','a','a','a','ae','ae','c','c','c','c','c','d','d',
'e','e','e','e','e','e','e','e','e','g','g','g','g','h','h',
'i','i','i','i','i','i','i','i','i','i','ij','j','k',
'n','n','n','n','n',
'o','o','o','o','o','o','o','o','o','o','o','o','oe',
'r','r','r','s','s','s','s','s','t','t','t',
'u','u','u','u','u','u','u','u','u','u','u','u','u','u','u','u','w','y','y','y','z','z','z','f','s');
  return str_replace($avant, $apres, $str);
} 
//****

if ( !isset($_GET['timekape'])) { $timekape = "0" ;  } else { $timekape=$_GET['timekape'] ; }


				

$result_1 = mysql_query("SELECT * FROM dossiers_bkpe where  ( timekape ='$timekape'  ) ");				
$nbr_analyse=mysql_num_rows($result_1) ;
				if ( $nbr_analyse != "1" ) 
				{ echo "Erreur - dossier non trouv&eacute; !" ; }
				else				
{
$row_kpe_1 = mysql_fetch_object ($result_1);
				$categorie=$row_kpe_1->categorie;
				$statut=$row_kpe_1->statut;
				$message=$row_kpe_1->message;
				$origine=$row_kpe_1->originetl;
				$id=$row_kpe_1->id;	
				$id_client=$row_kpe_1->id_client;	
					$categorie=$row_kpe_1->categorie;
				$statut=$row_kpe_1->statut;
				$message=$row_kpe_1->message;
				$id_client=$row_kpe_1->id_client;	
				$message=$row_kpe_1->message;
				$niveau=$row_kpe_1->niveau;
				$fiscal=$row_kpe_1->fiscal;
				$maison=$row_kpe_1->maison;
				$fiscal=$row_kpe_1->fiscal;
				$adpno=$row_kpe_1->adpno;
				$adcppno=$row_kpe_1->adcppno;
				$advillepno=$row_kpe_1->advillepno;
				$mcarre1=$row_kpe_1->mcarre1;
				$mcarre2=$row_kpe_1->mcarre2;
				$mcarre3=$row_kpe_1->mcarre3;
				$mcarre4=$row_kpe_1->mcarre4;
				$mcarre5=$row_kpe_1->mcarre5;
				$mcarre6=$row_kpe_1->mcarre6;
				$dependance=$row_kpe_1->dependance;
				$sinistre=$row_kpe_1->sinistre;
				$date_police=$row_kpe_1->date_police;
				$titrel1=$row_kpe_1->titrel1;
				$Noml1=$row_kpe_1->Noml1;
				$Prenoml1=$row_kpe_1->Prenoml1;
				$datel1=$row_kpe_1->datel1;
				$profl1=$row_kpe_1->profl1;
				$type_contratl1=$row_kpe_1->type_contratl1;		
				$revenusl1=$row_kpe_1->revenusl1;
				
				$titrel2=$row_kpe_1->titrel2;
				$Noml2=$row_kpe_1->Noml2;
				$Prenoml2=$row_kpe_1->Prenoml2;
				$datel2=$row_kpe_1->datel2;
				$profl2=$row_kpe_1->profl2;
				$type_contratl2=$row_kpe_1->type_contratl2;		
				$revenusl2=$row_kpe_1->revenusl2;
				
				$revenusautres1=$row_kpe_1->revenusautres1;
				$revenusautres2=$row_kpe_1->revenusautres2;
				
				$mrevenusautres1=$row_kpe_1->mrevenusautres1;
				$mrevenusautres2=$row_kpe_1->mrevenusautres2;
				$loyer=$row_kpe_1->loyer;
				$charges=$row_kpe_1->charges;
				$adresseb=$row_kpe_1->adresseb;
				
				
				$adresse2b=$row_kpe_1->adresse2b;
				$villeb=$row_kpe_1->villeb;
				
				 $type_garantie=$row_kpe_1->type_garantie;
				$infos_client=$row_kpe_1->infos_client;
				$provenance=$row_kpe_1->provenance;
				
				$villeb=$row_kpe_1->villeb;
				$id_client=$row_kpe_1->id_client;
				$prix=$row_kpe_1->prix;
				$formule=$row_kpe_1->formule;
				$id_partenaire=$row_kpe_1->id_partenaire;
				$compagnie=$row_kpe_1->compagnie;
				
				$niveau=$row_kpe_1->niveau ;
				$delai=$row_kpe_1->delai ;
				$achat=$row_kpe_1->achat ;
				$usage=$row_kpe_1->usage ;
				$invest=$row_kpe_1->invest ;
				$travaux=$row_kpe_1->travaux ;
				$agence=$row_kpe_1->agence ;
				$notaire=$row_kpe_1->notaire ;
				$apport=$row_kpe_1->apport ;
				$IR1=$row_kpe_1->IR1 ;
				$IR2=$row_kpe_1->IR2 ;
				$prix=$row_kpe_1->prix;
				
				
				

$result_11 = mysql_query("SELECT * FROM clients where   id ='$id_client'  ");
				$nbr_analyse_11=mysql_num_rows($result_11) ;
				if ( $nbr_analyse_11 != "1" ) 
				{ $nom = "inconnu" ; $prenom = "" ; }
				else
				{
				$row_kpe_11 = mysql_fetch_object ($result_11);				
				$e_mail=$row_kpe_11->email;
				$nom=$row_kpe_11->nom;
				$prenom=$row_kpe_11->prenom;
				$code_postal=$row_kpe_11->code_postal;				
				$portable=$row_kpe_11->portable; 
				$tel=$row_kpe_11->tel;
				$email=$row_kpe_11->email;
				$message_3=$row_kpe_11->message_3;
				$m_mme_mlle=$row_kpe_11->m_mme_mlle ;
				$adresse=$row_kpe_11->adresse;
				$code_postal=$row_kpe_11->code_postal;
				$ville=$row_kpe_11->ville;
				$timekape_client=$row_kpe_11->timekape;
				$id_apporteur=$row_kpe_11->id_apporteur;
				
			
				}
				

//if ( !isset($_POST['categorie'])) {  } else { $categorie=$_POST['categorie'] ; }

if ( !isset($_POST['message_new'])) { $message_new = "" ; } else { $message_new=$_POST['message_new'] ; }
$message_new = strtr($message_new, "'", " ")  ;
//$message_new = suppr_accents($message_new);
if ( !isset($_POST['capt'])) { $capt = "" ;  } else { $capt=$_POST['capt'] ; }
if ( !isset($_POST['captcha'])) { $captcha = "" ;  } else { $captcha=$_POST['captcha'] ; }

if ( !isset($_POST['statut'])) {  } else { $statut=$_POST['statut'] ; }
if ( !isset($_POST['prix'])) {  } else { $prix=$_POST['prix'] ; }
if ( !isset($_POST['infos_client'])) {  } else { $infos_client=$_POST['infos_client'] ; }
if ( !isset($_POST['nom'])) {  } else { $nom=$_POST['nom'] ; }
if ( !isset($_POST['prenom'])) {  } else { $prenom=$_POST['prenom'] ; }
if ( !isset($_POST['m_mme_mlle'])) {  } else { $m_mme_mlle=$_POST['m_mme_mlle'] ; }
if ( !isset($_POST['adresse'])) {  } else { $adresse=$_POST['adresse'] ; }
if ( !isset($_POST['code_postal'])) {  } else { $code_postal=$_POST['code_postal'] ; }
if ( !isset($_POST['ville'])) {  } else { $ville=$_POST['ville'] ; }
if ( !isset($_POST['tel'])) {  } else { $tel=$_POST['tel'] ; }
if ( !isset($_POST['portable'])) {  } else { $portable=$_POST['portable'] ; }
if ( !isset($_POST['email'])) {  } else { $email=$_POST['email'] ; }
if ( !isset($_POST['compagnie'])) {  } else { $compagnie=$_POST['compagnie'] ; }
if ( !isset($_POST['id_partenaire'])) {  } else { $id_partenaire=$_POST['id_partenaire'] ; }
if ( !isset($_POST['id_apporteur'])) {  } else { $id_apporteur=$_POST['id_apporteur'] ; }
if  ($categorie=="choisir" or $categorie=="" )  
{ 
$test_input_ok1 = "ko" ;
}



//if  ($message_new==""  )  
//{ 
//$test_input_ok1 = "ko" ;
//}

if  ($capt==""  )  
{ 
$test_input_ok1 = "ko" ;
}

if  ($capt != $captcha  )  
{ 
$test_input_ok1 = "ko" ;
}

if(isset($_POST['Operation_creer']))
{
$cree_1 = "ok" ;
$ko_input = "ko"  ;
$_POST['Operation_creer'] = null ;

if ( $test_input_ok1 == "ok" )
	{
	
$timekape_new = time() ;
$origine = "Partenaire" ;


//$id_partenaire = "1" ;
//$statut = "prise_de_contact" ;			
//$statut = "COM HT" ; 	
if ( $message_new != "" )
{	
	
	$query_11="INSERT INTO messages_dossiers_bkpe
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id_client."','".$origine."','".$message_new."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
 }
 
 mysql_query("UPDATE dossiers_bkpe  SET   statut='$statut' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
 
 mysql_query("UPDATE dossiers_bkpe  SET   timekape_last_modif='$timekape_new' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
  mysql_query("UPDATE dossiers_bkpe  SET   prix='$prix' WHERE timekape='$timekape'") or die('Error : '.mysql_error());	
    mysql_query("UPDATE dossiers_bkpe  SET   compagnie='$compagnie' WHERE timekape='$timekape'") or die('Error : '.mysql_error());	
    mysql_query("UPDATE dossiers_bkpe  SET   infos_client='$infos_client' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
    mysql_query("UPDATE dossiers_bkpe  SET   id_partenaire='$id_partenaire' WHERE timekape='$timekape'") or die('Error : '.mysql_error());	
	    mysql_query("UPDATE clients   SET   nom='$nom' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   prenom='$prenom' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   m_mme_mlle='$m_mme_mlle' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   adresse='$adresse' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   code_postal='$code_postal' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   ville='$ville' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   tel='$tel' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   portable='$portable' where   id ='$id_client'") or die('Error : '.mysql_error());	
		mysql_query("UPDATE clients   SET   email='$email' where   id ='$id_client'") or die('Error : '.mysql_error());	
	
	$message_dossier  = $_POST['message_new']  ;
	$message_dossier = str_replace('\n', '<br />', nl2br($_POST['message_new']));
	$message_dossier = addslashes($message_dossier);
	$prix = $prix ;
	$infos_client = $infos_client ;
	$nom = $nom ;
	$id_partenaire = $id_partenaire ;
	$origine = $origine ;
	$formule = $formule ;
	$id_apporteur = $id_apporteur ;
	
	if ( $message_new != "" )
	
	{
	include('bkpe_send_mail_form_modify_dossier.php');
	
	
	
	?>
	<div align=center> <span style="font-size: 14px; font-weight: bold;">
	Votre modification a &eacute;t&eacute; envoy&eacute;e !	</span>
	</div>	
	<?php
	}
	
	else
	{
	?>
	<div align=center> <span style="font-size: 14px; font-weight: bold;">
	Votre modification a &eacute;t&eacute; faite sans message (vide) envoy&eacute; !	</span>
	</div>	
	<?php
	
	
	}
	
	
	
	$cree_1 = "ko" ;
	$ko_input = "ok"  ;
	
	//$categorie = "choisir" ;
	$message_new="" ;
	
	
	}

}

//********  debut operation photo fichiers ******
//*****************************************
$erreur_1 = "" ;
if(isset($_POST['Operation_photo_1']))
{

$timekape_new = time() ;
$origine = "Partenaire" ;




$avatar= "_1" ;
include('upload_france_fr.php');
$fichier_1 = $fichier ;
$erreur_1 = $erreur ;

if ($erreur_1 == "Upload effectu&eacute; avec succ&egrave;s !" )
{

$query_11="INSERT INTO fichiers_dossiers_bkpe
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id_client."','".$origine."','".$fichier_1."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
}

//***** on enleve le flag du submit
$_POST['Operation_photo_1'] = null ;
}

//******** fin operation photo fichiers ******
//***************************************


?>


<li>

<?php echo $id ; ?> 


Provenance : <?php echo $provenance ; ?> <?php echo $message_3 ; ?> &nbsp ;&nbsp;
Nom du client : 

<?php
echo $nom."  ".$prenom ; " ".$telephone ; "  ".$portable ;    " -- "  .$timekape_client;
?>

 Formule d'origine :
<?php echo $formule ; ?> &nbsp; 
id partenaire  :

<?php echo $id_partenaire ; ?>

&nbsp; 
id Apporteur  :

<?php echo $id_apporteur ; ?>



&nbsp;&nbsp;id client :  &nbsp;
<?php echo $id_client ; ?>  &nbsp; &nbsp; <b><?php echo $tel ; ?>&nbsp; - &nbsp; <?php echo $portable ; ?></b> &nbsp; - &nbsp; <?php echo $timekape_client ; ?> IR = <?php echo $IR1 ; ?> + <?php echo $IR2 ; ?>
</li>







 
 
  <!--JANUS-->
                    <!--tableau d'information client-->
                    <table class="table table-bordered">
   <!--                      <thead>
                                <tr>
                                  <th>"Email"Lieu</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Username</th>
                                  <th>ll</th>
                                  <th>mm</th>
                                </tr>
                              </thead> -->
                        <tbody>
 
                            <tr>
                                <td><b> Courrier Client</br>
<a href="./courrier_vierge_texte_dossier_client_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "courrier client vierge"   ?></span></a> 


<br><br>
 <b> 
<a href="./courrier_LIP2.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Lettre Infos Pr&eacute;alable"   ?></span></a> 

<a href="./courrier_LIP_signature.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "LIP avec signature"   ?></span></a> 
 <br><br>
 
 
<a href="./courrier_TL2015_mandat_dossier_client_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Mandat pr&ecirc;t "   ?></span></a>


- 
<a href="./demande_banques.php?id=<?php echo $id ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Carcasse Banque "   ?></span></a>


 <br><br>
<a href="./courrier_conseil_signature.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Lettre Devoir pr&ecirc;t "   ?></span></a>



- 
<a href="./courrier_lettre_pret.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Lettre Debut pr&ecirc;t "   ?></span></a>






</td>
<td> &nbsp;&nbsp;&nbsp;&nbsp;

</td>   
<td> <b> Envoyer un email au client</b><br>

<a href="./email_dossier_devis.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email devis Assurance"   ?></span></a>

&nbsp;&nbsp;
<a href="./email_demande_appel.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email Etre Contact&eacute;"   ?></span></a> 
 <br><br>

<a href="./email_pret1.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email Pr&ecirc;t"   ?></span></a>

&nbsp;&nbsp;
<a href="./email_pret_sans_frais_client_fr.php?id=<?php echo $id_client ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email Pret 0 frais"   ?></span></a>
<br><br>

<a href="./email_dossier_refuse.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email Dossier refus&eacute "   ?></span></a>

<br><br>

<a href="./email_dossier_finalise_dossier_en_cours.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Email Dossier finalis&eacute; statut contrat en cours "   ?></span></a>

 </td>
 
 <td> &nbsp;&nbsp;&nbsp;&nbsp;

</td>   


<td> <b>Gestion Dossier</b>
<br>
<a href="./2015_dossier_client.php?id=<?php echo $id_client ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Tous les dossiers du client "   ?></span></a>
<br> 

<a href="./2015P2_modif_client.php?nom=<?php echo $nom ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "du meme nom "   ?></span></a>
<br>

<a href="./2015P3_modif_client.php?email=<?php echo $email ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "du meme email "   ?></span></a>

<br><br>
<a href="./modif_client2015.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Modifier la fiche"   ?></span></a>
&nbsp; 
<a href="./modif_profil2015.php?id_client=<?php echo $id_client ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Modifier MARCHE PAS"   ?></span></a>
- &nbsp;
<a href="./gestion_new_dossier_by_nom.php?id_recherche=<?php echo $id_client ; ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Creation Nv dossier" ?></span></a>

</td> <td>&nbsp;
 &nbsp; &nbsp;
 &nbsp; </td> <td><b>Autres</b><br><br>

Parrainage<br><br>Facturation<br>
&nbsp;
<a href="./facturation.php?timekape=<?php echo $timekape ; ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo "Faire la facture" ?></span></a><br>

</td>








<br>
 Derniere Modification : <?php echo $origine ; ?> &nbsp;&nbsp;   <?php echo $provenance ; ?> &nbsp;&nbsp; 
<?php echo $type_garantie ; ?> &nbsp;&nbsp;  <?php echo $niveau ; ?> &nbsp;&nbsp; 
<?php echo $maison ; ?> &nbsp;&nbsp;
<?php
echo $date_police ; 
?> &nbsp;<?php
echo $dependance ; 
?> &nbsp;<?php
echo $sinistre ; 
?> &nbsp;<?php
echo $adpno ; 
?> &nbsp;<?php
echo $adcppno ; 
?> &nbsp;<?php
echo $advillepno ; 
?> &nbsp;<?php
echo $mcarre1 ; 
?> &nbsp;<?php
echo $mcarre2 ; 
?> &nbsp;<?php
echo $mcarre3; 
?> &nbsp;<?php
echo $mcarre4 ; 
?> &nbsp;<?php
echo $mcarre5 ; 
?> &nbsp;<?php
echo $mcarre6 ; 
?> 






&nbsp;<?php echo $adresseb ; ?> &nbsp;
&nbsp;<?php echo $adresse2b ; ?> &nbsp;
&nbsp;<?php echo $codeb ; ?> &nbsp;
&nbsp;<?php echo $villeb ; ?> &nbsp;

&nbsp;<?php echo $loyer ; ?> &nbsp;
&nbsp;<?php echo $charges ; ?> &nbsp;

&nbsp;<?php
echo $titrel1 ; 
?>
&nbsp;<?php echo $Noml1 ; ?> &nbsp;
&nbsp;<?php echo $Prenoml1 ; ?> &nbsp;
&nbsp;<?php echo $datel1 ; ?> &nbsp;
&nbsp;<?php echo $profl1 ; ?> &nbsp;
&nbsp;<?php echo $type_contratl1 ; ?> &nbsp;
&nbsp;<?php echo $revenusl1 ; ?> &nbsp; 
&nbsp;<?php echo $Noml2 ; ?> &nbsp;
&nbsp;<?php echo $Prenoml2 ; ?> &nbsp;
&nbsp;<?php echo $datel2 ; ?> &nbsp;
&nbsp;<?php echo $profl2 ; ?> &nbsp;
&nbsp;<?php echo $type_contratl2 ; ?> &nbsp;
&nbsp;<?php echo $revenusl2 ; ?> &nbsp; <br>
&nbsp;<?php echo $revenusautres1 ; ?> &nbsp;
&nbsp;<?php echo $mrevenusautres1 ; ?> &nbsp;
&nbsp;<?php echo $revenusautres2 ; ?> &nbsp;
&nbsp;<?php echo $mrevenusautres2 ; ?> &nbsp;


&nbsp;<?php echo $niveau ; ?> &nbsp;
&nbsp;<?php echo $delai ; ?> &nbsp;
&nbsp;<?php echo $usage ; ?> &nbsp;
Montant :&nbsp;<?php echo $invest ; ?> &nbsp;
Travaux :&nbsp;<?php echo $travaux ; ?> &nbsp;
Agence :&nbsp;<?php echo $agence ; ?> &nbsp;
Notaire :&nbsp;<?php echo $notaire ; ?> &nbsp;
Apport : &nbsp;<?php echo $apport ; ?> &nbsp;






<?php
echo $fiscal ; 
?>



<div>


<table style=" border:0px solid #000032;" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" width="800" align="center">
<tr>
<td vAlign=center align=left width=800 bgColor=#ffffff >
	
	
<form class="" name="creation_inscription" action="<?php echo $url_bkpe ; ?>" enctype="multipart/form-data" method="post">
<br/>
<br/>

</td>
<div class="bkpe_annonce_input">
<!-- <select name="categorie" id="categorie"   >

<option value="choisir" <?php  if   ( $categorie=="" or $categorie=="choisir"    )   {  echo "selected" ;   }  ?>  >Choisir</option>
<option value="pret" <?php  if   (  $categorie=="pret"    )   {  echo "selected" ;   }  ?>  >Pr&ecirc;t</option>
<option value="epargne" <?php  if   (  $categorie=="epargne"    )   {  echo "selected" ;   }  ?>  >Epargne</option>

<option value="Loyers_Impayes" <?php  if   (  $categorie=="Loyers_Impayes"    )   {  echo "selected" ;   }  ?>  >Loyers Impayes</option>

<option value="assurance" <?php  if   (  $categorie=="assurance"    )   {  echo "selected" ;   }  ?>  >Assurance</option>

<option value="assurance Auto" <?php  if   (  $categorie=="assurance_Auto"    )   {  echo "selected" ;   }  ?>  >Assurance Auto</option>







<option value="pierrelocatif" <?php  if   (  $categorie=="pierrelocatif"    )   {  echo "selected" ;   }  ?>  >Pierre et Locatif</option>
<option value="grl-gli" <?php  if   (  $categorie=="grl-gli"    )   {  echo "selected" ;   }  ?>  >Loyers Impayes</option>

<option value="pno" <?php  if   (  $categorie=="pno"    )   {  echo "selected" ;   }  ?>  >PNO - Bailleur</option>
</select> -->

<?php
if   (  $categorie=="pret"    )   {  echo "Pr&ecirc;t" ;   }
if   (  $categorie=="epargne"    )   {  echo "Epargne" ;   }
if   (  $categorie=="assurance"    )   {  echo "Assurance" ;   }
if   (  $categorie=="Assurance auto"    )   {  echo "Assurance Auto" ;   }
if   (  $categorie=="pierrelocatif"    )   {  echo "Pierre et Locatif" ;   }
if   (  $categorie=="grl-gli"    )   {  echo "Loyers Impayes" ;   }
if   (  $categorie=="pno"    )   {  echo "PNO - Bailleur" ;   }

if ( ($categorie=="" or $categorie=="choisir" ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
{
echo "<br/>" ;
echo "<span id='color_error_mention'>" ;
echo "&nbsp;&nbsp;" ;
echo "Veuillez indiquer la categorie !" ; 
$test_input_ok = "ko" ;
echo "</span>" ;
}
?>

</div>















<br />
<br/>
<class="bkpe_annonce_etiquette">
Statut :
</div>
<class="bkpe_annonce_input">


<select name="statut" id="statut"   >

<option value="prise_de_contact" <?php  if   ( $statut=="prise_de_contact"  )   {  echo "selected" ;   }  ?>  >Prise de contact</option>


<option value="demande_information_complementaire" <?php  if   (  $statut=="demande_information_complementaire"    )   {  echo "selected" ;   }  ?>  >Demande d'information compl&eacute;mentaire</option>


<option value="en_attente_accord_client" <?php  if   (  $statut=="en_attente_accord_client"    )   {  echo "selected" ;   }  ?>  >En attente accord client</option>


<option value="Devis accepte" <?php  if   ( $statut=="Devis accepte"  )   {  echo "selected" ;   }  ?>  >Devis accepte</option>

<option value="contrat_en_cours" <?php  if   (  $statut=="contrat_en_cours"    )   {  echo "selected" ;   }  ?>  >Contrat en cours</option>




<option value="--------" <?php  if   ( $statut=="--------"  )   {  echo "selected" ;   }  ?>  >--------</option>



<option value="sinistre_declare" <?php  if   (  $statut=="sinistre_declare"    )   {  echo "selected" ;   }  ?>  >Assurance : Sinistre declare</option>
<option value="sinistre_regularise" <?php  if   (  $statut=="sinistre_regularise"    )   {  echo "selected" ;   }  ?>  >Assurance : Sinistre regularise</option>

<option value="contrat_resilie" <?php  if   (  $statut=="contrat_resilie"    )   {  echo "selected" ;   }  ?>  >Contrat r&eacute;sili&eacute;</option>


<option value="--------" <?php  if   ( $statut=="--------"  )   {  echo "selected" ;   }  ?>  >--------</option>

<option value="Credit_:_demande_suivie" <?php  if   (  $statut=="Credit_:_demande_suivie"    )   {  echo "selected" ;   }  ?>  >Credit : Demande suivie</option>

<option value="Credit_:_demande_refusee" <?php  if   (  $statut=="Credit_:_demande_refusee"    )   {  echo "selected" ;   }  ?>  >Credit : Demande refus&eacute;e</option>


<option value="Credit_:_mandat_envoye" <?php  if   (  $statut=="Credit_:_mandat_envoye"    )   {  echo "selected" ;   }  ?>  >Credit : Mandat Pret envoy&eacute;</option>


<option value="Credit_:_mandat_signe" <?php  if   (  $statut=="Credit_:_mandat_signe"    )   {  echo "selected" ;   }  ?>  >Credit : Mandat Pret sign&eacute;</option>


<option value="Credit_:_demande_information_complementaire" <?php  if   (  $statut=="Credit_:_demande_information_complementaire"    )   {  echo "selected" ;   }  ?>  >Credit : Demande d'information compl&eacute;mentaire</option>

<option value="Credit_:_Demande_banques_en_cours" <?php  if   (  $statut=="Credit_:_Demande_Banques_en_cours"    )   {  echo "selected" ;   }  ?>  >Credit : Demande Banques en cours</option>


<option value="Credit_:_Proposition_recue" <?php  if   (  $statut=="Credit_:_Proposition_recue"    )   {  echo "selected" ;   }  ?>  >Credit : Proposition recue</option>


<option value="Credit_:_Rdv_client_banque" <?php  if   (  $statut=="Credit_:_Rdv_client_banque"    )   {  echo "selected" ;   }  ?>  >Credit : Rdv client banque</option>

<option value="Credit_:_Attente_Accord_Client" <?php  if   (  $statut=="Credit_:_Attente_Accord_Client"    )   {  echo "selected" ;   }  ?>  >Credit : Attente Accord Client</option>



<option value="Credit_:_Attente_Accord_Banque" <?php  if   (  $statut=="Credit_:_Attente_Accord_Banque"    )   {  echo "selected" ;   }  ?>  >Credit : Attente Accord Banque</option>


<option value="Credit_:_Offre_de-pret_ok_CA" <?php  if   ( $statut=="offre_de-pret_ok_CA"  )   {  echo "selected" ;   }  ?>  >Accord Banque CA</option>


<option value="Credit_:_Offre_de-pret_ok_CE" <?php  if   ( $statut=="offre_de-pret_ok_CE"  )   {  echo "selected" ;   }  ?>  >Accord Banque CE</option>




<option value="Credit_:_Offre_de-pret_ok_CDN" <?php  if   ( $statut=="offre_de-pret_ok_CDN"  )   {  echo "selected" ;   }  ?>  >Accord Banque CDN</option>


<option value="Credit_:_Offre_de-pret_ok_CIC" <?php  if   ( $statut=="offre_de-pret_ok_CIC"  )   {  echo "selected" ;   }  ?>  >Accord Banque CIC</option>


<option value="Credit_:_Offre_de-pret_ok_CFONCIER" <?php  if   ( $statut=="offre_de-pret_ok_CFONCIER"  )   {  echo "selected" ;   }  ?>  >Accord Banque CFONCIER</option>


<option value="Credit_:_Offre_de-pret_ok_BNP" <?php  if   ( $statut=="offre_de-pret_ok_BNP"  )   {  echo "selected" ;   }  ?>  >Accord Banque BNP</option>



<option value="Credit_:_Offre_de-pret_AUTRES" <?php  if   (  $statut=="Credit_:_Offre_de-pret_AUTRES"    )   {  echo "selected" ;   }  ?>  >Credit : Offre de pret Banque Autre</option>



<option value="Credit_:_Offre_de_pret_recue" <?php  if   (  $statut=="Credit_:_Offre_de_pret_recue"    )   {  echo "selected" ;   }  ?>  >Credit : Offre de pr&ecirc;t recue par client</option>
<option value="Credit_:_Offre_de_pret_retournee" <?php  if   (  $statut=="Credit_:_Offre_de_pret_retournee"    )   {  echo "selected" ;   }  ?>  >Credit : Offre de pr&ecirc;t retourn&eacute;e sign&eacute;e par client</option>

<option value="Credit_:_Rdv_notaire" <?php  if   (  $statut=="Credit_:_Rdv_notaire"    )   {  echo "selected" ;   }  ?>  >Credit : Rendez-vous Notaire</option>

<option value="Credit_:_Pret_débloque" <?php  if   (  $statut=="Credit_:_Pret_debloque"    )   {  echo "selected" ;   }  ?>  >Credit : Pret debloqu&eacute;</option>




<option value="--------" <?php  if   ( $statut=="--------"  )   {  echo "selected" ;   }  ?>  >--------</option>


<option value="prochain_rdv_1" <?php  if   (  $statut=="prochain_rdv_1"    )   {  echo "selected" ;   }  ?>  >Rendez-vous 1 Courtier</option>


<option value="prochain_rdv_2" <?php  if   (  $statut=="prochain_rdv_2"    )   {  echo "selected" ;   }  ?>  >Rendez-vous 2 Courtier</option>

<option value="prochain_rdv_3" <?php  if   (  $statut=="prochain_rdv_3"    )   {  echo "selected" ;   }  ?>  >Rendez-vous 3 Courtier</option>

<option value="prochain_rdv_4" <?php  if   (  $statut=="prochain_rdv_4"    )   {  echo "selected" ;   }  ?>  >Rendez-vous 4 Courtier</option>



<option value="--------" <?php  if   ( $statut=="--------"  )   {  echo "selected" ;   }  ?>  >--------</option>



<option value="Loyers_cherche_Loc" <?php  if   (  $statut=="Loyers_cherche_Loc"    )   {  echo "selected" ;   }  ?>  >Loyers en Recherche locataire</option>




<option value="Loyers_propo_GRL" <?php  if   (  $statut=="Loyers_propo_GRL"    )   {  echo "selected" ;   }  ?>  >Loyers Propo GRL</option>



<option value="Loyers_propo_GLI" <?php  if   (  $statut=="Loyers_propo_GLI"    )   {  echo "selected" ;   }  ?>  >Loyers Propo GLI</option>




<option value="Loyers_contrat_GRL_SA" <?php  if   (  $statut=="Loyers_contrat_GRL_SA"    )   {  echo "selected" ;   }  ?>  >Loyers contrat GRL Solly Azar</option>



<option value="Loyers_contrat_GRL_Interassurances" <?php  if   (  $statut=="Loyers_contrat_GRL_Interassurances"    )   {  echo "selected" ;   }  ?>  >Loyers contrat GRL Interassurances</option>



<option value="Loyers_contrat_GLI_SA" <?php  if   (  $statut=="Loyers_contrat_GLI_SA"    )   {  echo "selected" ;   }  ?>  >Loyers Contrat GLI Solly Azar</option>



<option value="Loyers_contrat_GLI_Insured" <?php  if   (  $statut=="Loyers_contrat_GLI_Insured"    )   {  echo "selected" ;   }  ?>  >Loyers Contrat GLI Insured</option>








<option value="Ass_propo_pno" <?php  if   (  $statut=="Ass_propo_pno"    )   {  echo "selected" ;   }  ?>  >Assurance : Propo PNO</option>
<option value="Ass_propo_pno2" <?php  if   (  $statut=="Ass_propo_pno2"    )   {  echo "selected" ;   }  ?>  >Assurance : Propo PNO Mixte</option>
<option value="Ass_propo_pno3" <?php  if   (  $statut=="Ass_propo_pno3"    )   {  echo "selected" ;   }  ?>  >Assurance : Propo PNO Commerce</option>
<option value="Ass_propo_auto_moto" <?php  if   (  $statut=="Ass_propo_auto_moto"    )   {  echo "selected" ;   }  ?>  >Assurance : Propo Auto Moto</option>

<option value="Epargne" <?php  if   (  $statut=="Epargne"    )   {  echo "selected" ;   }  ?>  >Epargne : propo Ass vie</option>
<option value="Epargne_SCPI" <?php  if   (  $statut=="Epargne_SCPI"    )   {  echo "selected" ;   }  ?>  >Epargne : Conseils</option>
<option value="Epargne_Conseils" <?php  if   (  $statut=="Epargne_Conseils"    )   {  echo "selected" ;   }  ?>  >Epargne : propo SCPI</option>
<option value="bien_livre" <?php  if   (  $statut=="bien_livre"    )   {  echo "selected" ;   }  ?>  >Bien livr&eacute;</option>

<option value="bien_loue" <?php  if   (  $statut=="bien_loue"    )   {  echo "selected" ;   }  ?>  >Bien lou&eacute;</option>
<option value="bien_non_loue" <?php  if   (  $statut=="bien_non_loue"    )   {  echo "selected" ;   }  ?>  >Bien non lou&eacute;</option>


<option value="--------" <?php  if   ( $statut=="--------"  )   {  echo "selected" ;   }  ?>  >--------</option>

<option value="dossier_finalise" <?php  if   (  $statut=="dossier_finalise"    )   {  echo "selected" ;   }  ?>  >Dossier finalis&eacute;</option>






<option value="archivage" <?php  if   (  $statut=="archivage"    )   {  echo "selected" ;   }  ?>  >Archivage</option>
<option value="corbeille" <?php  if   (  $statut=="corbeille"    )   {  echo "selected" ;   }  ?>  >Corbeille</option>


</select>








<?php
//echo $statut ;
?>












<br />
<br/>
<class="bkpe_annonce_etiquette">
Message initial ( <?php echo date("d.m.Y", "$timekape");  ?>  )
<!-- <font color="#FF0000">*</font>  -->:
</div>
<class="bkpe_annonce_input">
<?php
echo $message ;
?>
</div>


<?php
$result_1 = mysql_query("SELECT * FROM messages_dossiers_bkpe where  ( timekape_dossier ='$timekape' and id_client = '$id_client' ) ORDER BY timekape_last_modif ASC ");				
$nbr_analyse=mysql_num_rows($result_1) ;
for ($i = 1 ; $i <=$nbr_analyse ; $i++  )
{
$row_kpe_1 = mysql_fetch_object ($result_1);
				$origine=$row_kpe_1->origine;
				$message=$row_kpe_1->message;
				$timekape_message=$row_kpe_1->timekape;
				$origine=$row_kpe_1->originetl;
?>
<br />
<br/>
<div class="bkpe_annonce_etiquette">
Message interm&eacute;diaire du <?php echo $origine ;  ?> <br/> ( <?php echo date("d.m.Y", "$timekape_message");  ?>  )
<!-- <font color="#FF0000">*</font>  -->:
</div>
<div class="bkpe_annonce_input">
<br/>
<?php
echo $message ;
?>
<br/>
<br/>
</td>
</div>
<?php
}
?>

<!-- ****************************** -->











<br />
</div>

<div class="bkpe_annonce_etiquette">
<!-- Nouveau message <font color="#FF0000">*</font> :  -->
(visible client et envoi email) Nouveau message 2.0  :
</div>
<div class="bkpe_annonce_input">
<TEXTAREA NAME="message_new" COLS=60 ROWS=4><?php echo $message_new ; ?></TEXTAREA>

<?php

//if ( ($message_new==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
//{
//echo "<br/>" ;
//echo "<span id='color_error_mention'>" ;
//echo "&nbsp;&nbsp;" ;
//echo "Veuillez indiquer votre nouveau message !" ; 
//$test_input_ok = "ko" ;
//echo "</span>" ;
//}
?>
</div>






</div> 
<div>

</br> </br>

<div class="bkpe_annonce_etiquette">
<!-- Nouveau message <font color="#FF0000">*</font> :  -->
non visible client et pas envoi email :
</div>
<div class="bkpe_annonce_input">



<select name="compagnie" id="compagnie"   >
<option value="---" <?php  if   ( $compagnie=="---"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Ass_April" <?php  if   ( $compagnie=="Ass_April"  )   {  echo "selected" ;   }  ?>  >Ass April</option>
<option value="Ass_InterAssurances" <?php  if   ( $compagnie=="Ass_InterAssurances"  )   {  echo "selected" ;   }  ?>  >Ass Inter Assurances</option>
<option value="Ass_Insured" <?php  if   ( $compagnie=="Ass_Insured"  )   {  echo "selected" ;   }  ?>  >Ass Insured</option>
<option value="Ass_Maxance" <?php  if   ( $compagnie=="Ass_Maxance"  )   {  echo "selected" ;   }  ?>  >Ass Maxance</option>
<option value="Ass_Solly" <?php  if   ( $compagnie=="Ass_Solly"  )   {  echo "selected" ;   }  ?>  >Ass Solly Azar</option>
<option value="Ass_Zephir" <?php  if   ( $compagnie=="Ass_Zephir"  )   {  echo "selected" ;   }  ?>  >Ass Zephir</option>


<option value="---" <?php  if   ( $compagnie=="---"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Banque_CA" <?php  if   ( $compagnie=="Banque _CA"  )   {  echo "selected" ;   }  ?>  >Credit Agricole   </option>
<option value="Banque_CE" <?php  if   ( $compagnie=="Banque _CE"  )   {  echo "selected" ;   }  ?>  >Credit Epargne   </option>
<option value="Banque_CF" <?php  if   ( $compagnie=="Banque _CF"  )   {  echo "selected" ;   }  ?>  >Credit Foncier   </option>
<option value="Banque_Credit_CDN" <?php  if   ( $compagnie=="Banque_Credit_CDN"  )   {  echo "selected" ;   }  ?>  >Credit du Nord   </option>
<option value="Banque_CA" <?php  if   ( $compagnie=="Banque _CA"  )   {  echo "selected" ;   }  ?>  >Credit Agricole   </option>
<option value="Banque_CA" <?php  if   ( $compagnie=="Banque _CA"  )   {  echo "selected" ;   }  ?>  >Credit Agricole   </option>
<option value="Banque_RA" <?php  if   ( $compagnie=="Banque _BA"  )   {  echo "selected" ;   }  ?>  >Rhone Alpes   </option>
<option value="----" <?php  if   ( $compagnie=="----"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Finances_Partenaires" <?php  if   ( $compagnie=="Finances_Partenaires"  )   {  echo "selected" ;   }  ?>  >Finances Partenaires</option>
<option value="----" <?php  if   ( $compagnie=="----"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Axa_thema" <?php  if   ( $compagnie=="Axa_thema"  )   {  echo "selected" ;   }  ?>  >Axa Thema </option>
<option value="Generali" <?php  if   ( $compagnie=="Generali"  )   {  echo "selected" ;   }  ?>  >Generali </option>
<option value="Primonial" <?php  if   ( $compagnie=="Primonial"  )   {  echo "selected" ;   }  ?>  >Primonial  </option>
<option value="Unep" <?php  if   ( $compagnie=="Unep"  )   {  echo "selected" ;   }  ?>  >Unep   </option>
<option value="Swisslife" <?php  if   ( $compagnie=="Swisslife"  )   {  echo "selected" ;   }  ?>  >Swisslife          </option>
<option value="Inocap" <?php  if   ( $compagnie=="Inocap"  )   {  echo "selected" ;   }  ?>  >Inocap  </option>
</select>
<?php
//if ( ($compagnie==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>


<?php
//echo $compagnie ;
?>
<br>
 Modifier le montant du mandat ou de la com  :

<TEXTAREA NAME="prix" COLS=8 ROWS=1><?php echo $prix ; ?></TEXTAREA>
<?php
//if ( ($prix==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?> 
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

<br> <br>
 infos internes :

<TEXTAREA NAME="infos_client" COLS=55 ROWS=2><?php echo $infos_client ; ?></TEXTAREA>
<?php
//if ( ($infos_client==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

 


</div>



<!-- *********** pour introduction de fichiers par le client  debut ****** -->
<!-- *********************************************************** -->


<div class="bkpe_annonce_etiquette">
Fichiers :


<br/>
<?php
echo $erreur_1 ;
?>
</div>
<div class="bkpe_annonce_input">
<input type="hidden" name="MAX_FILE_SIZE" value="4000000">	
<input type="hidden" name="timekape" value=<?php echo $timekape ; ?>> 
  Nouveau fichier&nbsp;:&nbsp; 
	 <input type="file" name="avatar_1">
     
	 <input type="submit" name="Operation_photo_1" value="Envoyer fichier !" />
</div>

<!-- ************** pour introduction de fichiers par le client fin ****** -->


<?php
$result_1 = mysql_query("SELECT * FROM fichiers_dossiers_bkpe where  ( timekape_dossier ='$timekape' and id_client = '$id_client' ) ORDER BY timekape_last_modif ASC ");				
$nbr_analyse=mysql_num_rows($result_1) ;
for ($i = 1 ; $i <=$nbr_analyse ; $i++  )
{
$row_kpe_1 = mysql_fetch_object ($result_1);
				$origine=$row_kpe_1->origine;
				$message=$row_kpe_1->message;
				$timekape_message=$row_kpe_1->timekape;
?>
<br />
<br/>
<div class="bkpe_annonce_etiquette">
Fichier <?php echo $origine ;  ?> ( <?php echo date("d.m.Y", "$timekape_message");  ?>  )
<!-- <font color="#FF0000">*</font>  -->:
</div>
<div class="bkpe_annonce_input">
<!-- <a href="../membre/upload_france_fr/<?php  echo $message ;   ?>" target="_blank"><span style="font-size:12px;  color:blue;"><?php echo $message ;     ?></span></a> -->

<a href="../membre/upload_france_fr/<?php  echo $message ;   ?>" target="_blank"><span style="font-size:12px;  color:blue;"><?php echo $message ;     ?></span></a> 
<?php
//echo $message ;
?>
<br/>
<br/>
</div>
<?php
}
?>











<!-- ************************************************************ -->


<br />
<br/>
<div class="bkpe_annonce_etiquette">
Pour des raisons de s&eacute;curit&eacute;, 
<br/>veuillez recopier le nombre suivant  <font color="#FF0000">*</font> :
<?php
$nb_min = 1;
$nb_max = 1000;
$nombre = mt_rand($nb_min,$nb_max);
echo $nombre;
?>
<br/>
</div>
<div class="bkpe_annonce_input">
<br/>
<input type="text" id="capt"  name="capt"  STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" size="3" maxlength="3" value="" >
<br/>
<br/>
<?php

if ( ($capt==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
{
//echo "<br/>" ;
echo "<span id='color_error_mention'>" ;
echo "&nbsp;&nbsp;" ;
echo "Veuillez indiquer un nombre !" ; 
$test_input_ok = "ko" ;
echo "</span>" ;
}
?>
</div>


<br/>
<br/>
<br/>
<br/>

<div class="bkpe_annonce_etiquette">
 <!-- <font color="#FF0000">*</font> = Mentions Obligatoires  -->
 <!-- <font color="#FF0000">*</font> = Mentions Obligatoires  -->
 &nbsp;&nbsp;&nbsp;
</div>
<div class="bkpe_annonce_input">

<input type="hidden" name="captcha" value=<?php echo $nombre ; ?>> 

&nbsp;&nbsp;&nbsp;<input type="submit" name="Operation_creer" value="Modifier dossier !" />
</div>

</form>
</td>

</tr>
</table>

<?php
}
//************* fin corps du traitement  ********




//*************************************  
  

}
?>
</div>

<br/>
<br/>
<br/>
</body>
</html>