<?php
session_start();
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
  $pseudo = $_SESSION['_pseudo'];
  $mdp = $_SESSION['_mdp'];
  
  
  

  echo '<div class="conteiner">';
  echo '<br><br>Suivi de  <b>'.$pseudo.'</b>';
  
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
 <a href="./gestion_dossier.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Gerer les Dossier en cours</a><br><br>
 
 
 <?php
 
 $id_partenaire_recherche=$_COOKIE["myforum_login_guides1"];
	
	$result_35 = mysql_query("SELECT * FROM partenaires where   id ='$id_partenaire_recherche'");
				$row_kpe_35 = mysql_fetch_object ($result_35);
				$voir_dossiers=$row_kpe_35->voir_dossiers;
				$modification_dossiers=$row_kpe_35->modification_dossiers;
	
				
	if ($voir_dossiers=="oui"  || $modification_dossiers=="oui" )
	{
  

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
				$epargne=$row_kpe_1->epargne ;
				$demand_duree=$row_kpe_1->demand_duree ;
				$demand_adi=$row_kpe_1->demand_adi ;
				$demand_adi1=$row_kpe_1->demand_adi1 ;
				$demand_cout_garantie=$row_kpe_1->demand_cout_garantie ;
				$demand_comment=$row_kpe_1->demand_comment ;
				$estimationBienActuel=$row_kpe_1->estimationBienActuel ;
				
				
				

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
				

	
$result_111 = mysql_query("SELECT * FROM clients_profil_bkpe where   id_client ='$id_client'  ");
				$nbr_analyse_111=mysql_num_rows($result_111) ;
				if ( $nbr_analyse_111 != "1" ) 
				{ $nom = "inconnu" ; $prenom = "" ; }
				else
				{
				$row_kpe_111 = mysql_fetch_object ($result_111);				
				
				$date_naissance_mr=$row_kpe_111->date_naissance_mr;
				
				$type_revenu_mme=$row_kpe_111->type_revenu_mme;
				$type_revenu_mr=$row_kpe_111->type_revenu_mr;
				$ancien1=$row_kpe_111->ancien1;
				$ancien2=$row_kpe_111->ancien2;
				$montant_revenu_mme=$row_kpe_111->montant_revenu_mme;
				$montant_revenu_mr=$row_kpe_111->montant_revenu_mr;
				$profession1=$row_kpe_111->profession1;
				$profession2=$row_kpe_111->profession2;
				
				$date_naissance_mme=$row_kpe_111->date_naissance_mme;
				$nomJeuneFille=$row_kpe_111->nomJeuneFille;
				$Nom2=$row_kpe_111->Nom2;
				$Prenom2=$row_kpe_111->Prenom2;
				$titre2=$row_kpe_111->titre2;
				
				$sit_patrimoniale=$row_kpe_111->sit_patrimoniale;
				$impot2=$row_kpe_111->impot2;
				$impot1=$row_kpe_111->impot1;
				$estimationBienActuel=$row_kpe_111->estimationBienActuel;
				$banque1=$row_kpe_111->banque1;
				$banque2=$row_kpe_111->banque2;
				
				$enfant=$row_kpe_111->enfant;
				
				$autresRevenus1=$row_kpe_111->autresRevenus1;
				$autresRevenus2=$row_kpe_111->autresRevenus2;
				$autresRevenus3=$row_kpe_111->autresRevenus3;
				$autresRevenus4=$row_kpe_111->autresRevenus4;
				
				$autresCharges1=$row_kpe_111->autresCharges1;
				$autresCharges2=$row_kpe_111->autresCharges2;
				$autresCharges3=$row_kpe_111->autresCharges3;
				$autresCharges4=$row_kpe_111->autresCharges4;
				$autresCharges5=$row_kpe_111->autresCharges5;
				$chargesMontant=$row_kpe_111->chargesMontant;
				$ChargesCrd=$row_kpe_111->ChargesCrd;
				$ChargesFin=$row_kpe_111->ChargesFin;
				
				
			
			
				}
				

//if ( !isset($_POST['categorie'])) {  } else { $categorie=$_POST['categorie'] ; }

if ( !isset($_POST['message_new'])) { $message_new = "" ; } else { $message_new=$_POST['message_new'] ; }
$message_new = strtr($message_new, "'", " ")  ;
//$message_new = suppr_accents($message_new);
if ( !isset($_POST['capt'])) { $capt = "" ;  } else { $capt=$_POST['capt'] ; }
if ( !isset($_POST['captcha'])) { $captcha = "" ;  } else { $captcha=$_POST['captcha'] ; }

if ( !isset($_POST['statut'])) {  } else { $statut=$_POST['statut'] ; }
if ( !isset($_POST['prix'])) {  } else { $prix=$_POST['prix'] ; }

if ( !isset($_POST['apport'])) {  } else { $apport=$_POST['apport'] ; } 
if ( !isset($_POST['notaire'])) {  } else { $notaire=$_POST['notaire'] ; } 
if ( !isset($_POST['travaux'])) {  } else { $travaux=$_POST['travaux'] ; } 
if ( !isset($_POST['achat'])) {  } else { $achat=$_POST['achat'] ; }
if ( !isset($_POST['invest'])) {  } else { $invest=$_POST['invest'] ; }
if ( !isset($_POST['agence'])) {  } else { $agence=$_POST['agence'] ; }  
if ( !isset($_POST['delai'])) {  } else { $delai=$_POST['delai'] ; } 
if ( !isset($_POST['banque1'])) {  } else { $banque1=$_POST['banque1'] ; } 
if ( !isset($_POST['banque2'])) {  } else { $banque2=$_POST['banque2'] ; }  
if ( !isset($_POST['estimationBienActuel'])) {  } else { $estimationBienActuel=$_POST['estimationBienActuel'] ; } 


if ( !isset($_POST['demand_cout_garantie'])) {  } else { $demand_cout_garantie=$_POST['demand_cout_garantie'] ; }
if ( !isset($_POST['demand_comment'])) {  } else { $demand_comment=$_POST['demand_comment'] ; } 

if ( !isset($_POST['demand_adi'])) {  } else { $demand_adi=$_POST['demand_adi'] ; }
if ( !isset($_POST['demand_adi1'])) {  } else { $demand_adi1=$_POST['demand_adi1'] ; }
if ( !isset($_POST['demand_duree'])) {  } else { $demand_duree=$_POST['demand_duree'] ; }

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


if ( !isset($_POST['date_naissance_mr'])) {  } else { $date_naissance_mr=$_POST['date_naissance_mr'] ; }
if ( !isset($_POST['Nom2'])) {  } else { $Nom2=$_POST['Nom2'] ; }
if ( !isset($_POST['Prenom2'])) {  } else { $Prenom2=$_POST['Prenom2'] ; }
if ( !isset($_POST['titre2'])) {  } else { $titre2=$_POST['titre2'] ; }
if ( !isset($_POST['impot1'])) {  } else { $impot1=$_POST['impot1'] ; }
if ( !isset($_POST['impot2'])) {  } else { $impot2=$_POST['impot2'] ; }

if ( !isset($_POST['enfant'])) {  } else { $enfant=$_POST['enfant'] ; }
if ( !isset($_POST['sit_patrimoniale'])) {  } else { $sit_patrimoniale=$_POST['sit_patrimoniale'] ; }
if ( !isset($_POST['date_naissance_mme'])) {  } else { $date_naissance_mme=$_POST['date_naissance_mme'] ; }
if ( !isset($_POST['nomJeuneFille'])) {  } else { $nomJeuneFille=$_POST['nomJeuneFille'] ; }

if ( !isset($_POST['type_revenu_mr'])) {  } else { $type_revenu_mr=$_POST['type_revenu_mr'] ; }
if ( !isset($_POST['type_revenu_mme'])) {  } else { $type_revenu_mme=$_POST['type_revenu_mme'] ; }
if ( !isset($_POST['ancien1'])) {  } else { $ancien1=$_POST['ancien1'] ; }
if ( !isset($_POST['ancien2'])) {  } else { $ancien2=$_POST['ancien2'] ; }
if ( !isset($_POST['montant_revenu_mme'])) {  } else { $montant_revenu_mme=$_POST['montant_revenu_mme'] ; }
if ( !isset($_POST['montant_revenu_mr'])) {  } else { $montant_revenu_mr=$_POST['montant_revenu_mr'] ; }
if ( !isset($_POST['profession1'])) {  } else { $profession1=$_POST['profession1'] ; }
if ( !isset($_POST['profession2'])) {  } else { $profession2=$_POST['profession2'] ; }


if ( !isset($_POST['autresRevenus1'])) {  } else { $autresRevenus1=$_POST['autresRevenus1'] ; }
if ( !isset($_POST['autresRevenus2'])) {  } else { $autresRevenus2=$_POST['autresRevenus2'] ; }
if ( !isset($_POST['autresRevenus3'])) {  } else { $autresRevenus3=$_POST['autresRevenus3'] ; }
if ( !isset($_POST['autresRevenus4'])) {  } else { $autresRevenus4=$_POST['autresRevenus4'] ; }

if ( !isset($_POST['autresCharges1'])) {  } else { $autresCharges1=$_POST['autresCharges1'] ; }
if ( !isset($_POST['autresCharges2'])) {  } else { $autresCharges2=$_POST['autresCharges2'] ; }
if ( !isset($_POST['autresCharges3'])) {  } else { $autresCharges3=$_POST['autresCharges3'] ; }
if ( !isset($_POST['autresCharges4'])) {  } else { $autresCharges4=$_POST['autresCharges4'] ; }
if ( !isset($_POST['autresCharges5'])) {  } else { $autresCharges5=$_POST['autresCharges5'] ; }
if ( !isset($_POST['chargesMontant'])) {  } else { $chargesMontant=$_POST['chargesMontant'] ; }
if ( !isset($_POST['ChargesCrd'])) {  } else { $ChargesCrd=$_POST['ChargesCrd'] ; }
if ( !isset($_POST['ChargesFin'])) {  } else { $ChargesFin=$_POST['ChargesFin'] ; }







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
  mysql_query("UPDATE dossiers_bkpe  SET   demand_adi='$demand_adi' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
   mysql_query("UPDATE dossiers_bkpe  SET   demand_adi1='$demand_adi1' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
    mysql_query("UPDATE dossiers_bkpe  SET   demand_cout_garantie='$demand_cout_garantie' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
     mysql_query("UPDATE dossiers_bkpe  SET   demand_duree='$demand_duree' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
      mysql_query("UPDATE dossiers_bkpe  SET   demand_comment='$demand_comment' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
          mysql_query("UPDATE dossiers_bkpe  SET   delai='$delai' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
            mysql_query("UPDATE dossiers_bkpe  SET   achat='$achat' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
             mysql_query("UPDATE dossiers_bkpe  SET   invest='$invest' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
                
       
        mysql_query("UPDATE dossiers_bkpe  SET   travaux='$travaux' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
         mysql_query("UPDATE dossiers_bkpe  SET   notaire='$notaire' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
          mysql_query("UPDATE dossiers_bkpe  SET   agence='$agence' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
      
       mysql_query("UPDATE dossiers_bkpe  SET   apport='$apport' WHERE timekape='$timekape'") or die('Error : '.mysql_error());
 
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
		
		mysql_query("UPDATE clients_profil_bkpe   SET   date_naissance_mr='$date_naissance_mr' where  id_client='$id_client'") or die('Error : '.mysql_error());	
		
	 mysql_query("UPDATE clients_profil_bkpe  SET   estimationBienActuel='$estimationBienActuel' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	 
	 mysql_query("UPDATE clients_profil_bkpe  SET   banque1='$banque1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	 
	 mysql_query("UPDATE clients_profil_bkpe  SET   banque2='$banque2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	  mysql_query("UPDATE clients_profil_bkpe  SET   impot2='$impot2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	   mysql_query("UPDATE clients_profil_bkpe  SET   impot1='$impot1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	    mysql_query("UPDATE clients_profil_bkpe  SET   titre2='$titre2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	     mysql_query("UPDATE clients_profil_bkpe  SET   Nom2='$Nom2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
	      mysql_query("UPDATE clients_profil_bkpe  SET   Prenom2='$Prenom2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());	
		  mysql_query("UPDATE clients_profil_bkpe  SET   enfant='$enfant' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   sit_patrimoniale='$sit_patrimoniale' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   date_naissance_mme='$date_naissance_mme' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   nomJeuneFille='$nomJeuneFille' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   type_revenu_mr='$type_revenu_mr' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   type_revenu_mme='$type_revenu_mme' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   ancien1='$ancien1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   ancien2='$ancien2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   montant_revenu_mr='$montant_revenu_mr' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   montant_revenu_mme='$montant_revenu_mme' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   profession1='$profession1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   profession2='$profession2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresRevenus1='$autresRevenus1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresRevenus2='$autresRevenus2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresRevenus3='$autresRevenus3' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresRevenus4='$autresRevenus4' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresCharges1='$autresCharges1' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresCharges2='$autresCharges2' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresCharges3='$autresCharges3' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresCharges4='$autresCharges4' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   autresCharges5='$autresCharges5' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   chargesMontant='$chargesMontant' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   ChargesCrd='$ChargesCrd' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
		  mysql_query("UPDATE clients_profil_bkpe  SET   ChargesFin='$ChargesFin' WHERE id_client='$id_client'") or die('Error : '.mysql_error());
       
		
	
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
	$demand_cout_garantie = $demand_cout_garantie ;
	$achat = $achat ;
	$invest = $invest ;
	$travaux = $travaux ;
	
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
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message,vu)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id_client."','".$origine."','".$fichier_1."','Oui')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
}

//***** on enleve le flag du submit
$_POST['Operation_photo_1'] = null ;
}

//******** fin operation photo fichiers ******
//***************************************


?>
<form class="" name="creation_inscription" action="<?php echo $url_bkpe ; ?>" enctype="multipart/form-data" method="post">
<div>
<br>
(non visible client) 


<select name="compagnie" id="compagnie"   >
<option value="---" <?php  if   ( $compagnie=="---"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Ass_April" <?php  if   ( $compagnie=="Ass_April"  )   {  echo "selected" ;   }  ?>  >Ass April</option>
<option value="Ass_InterAssurances" <?php  if   ( $compagnie=="Ass_InterAssurances"  )   {  echo "selected" ;   }  ?>  >Ass Inter Assurances</option>
<option value="Ass_Insured" <?php  if   ( $compagnie=="Ass_Insured"  )   {  echo "selected" ;   }  ?>  >Ass Insured</option>
<option value="Ass_Maxance" <?php  if   ( $compagnie=="Ass_Maxance"  )   {  echo "selected" ;   }  ?>  >Ass Maxance</option>
<option value="Ass_Solly" <?php  if   ( $compagnie=="Ass_Solly"  )   {  echo "selected" ;   }  ?>  >Ass Solly Azar</option>
<option value="Ass_Zephir" <?php  if   ( $compagnie=="Ass_Zephir"  )   {  echo "selected" ;   }  ?>  >Ass Zephir</option>


<option value="---" <?php  if   ( $compagnie=="---"  )   {  echo "selected" ;   }  ?>  ></option>
<option value="Banque_CA" <?php  if   ( $compagnie=="Banque_CA"  )   {  echo "selected" ;   }  ?>  >Banque CA  </option>
<option value="Banque_CE" <?php  if   ( $compagnie=="Banque_CE"  )   {  echo "selected" ;   }  ?>  >Credit Epargne   </option>
<option value="Banque_CF" <?php  if   ( $compagnie=="Banque_CF"  )   {  echo "selected" ;   }  ?>  >Credit Foncier   </option>
<option value="Banque_Credit_CDN" <?php  if   ( $compagnie=="Banque_Credit_CDN"  )   {  echo "selected" ;   }  ?>  >Credit du Nord   </option>
<option value="Banque_PO" <?php  if   ( $compagnie=="Banque _PO"  )   {  echo "selected" ;   }  ?>  >Banque Pop   </option>
<option value="Banque_CA_RO" <?php  if   ( $compagnie=="Banque_CA_RO"  )   {  echo "selected" ;   }  ?>  >Credit Agricole Besancon  </option>
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
<br><br>
 infos interne :

<TEXTAREA NAME="infos_client" COLS=45 ROWS=1><?php echo $infos_client ; ?></TEXTAREA>
<?php
//if ( ($infos_client==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>-------------------------------------------------------------------------------------------
<br><br>
<b> Infos sur le Profil Client :</b>
 
 </br></br>  
Estimation bien actuel

<TEXTAREA NAME="estimationBienActuel" COLS=25 ROWS=1><?php echo $estimationBienActuel ; ?></TEXTAREA>
<?php
//if ( ($estimationBienActuel==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
	
Nombre enfants

<TEXTAREA NAME="enfant" COLS=8 ROWS=1><?php echo $enfant ; ?></TEXTAREA>
<?php
//if ( ($enfant==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>								
	


 <br>-------------------------------------------------------------------------------------------
   <tbody>

                            <tr>
                                <td>
								<TEXTAREA NAME="sit_patrimoniale" COLS=20 ROWS=1><?php echo $sit_patrimoniale ; ?></TEXTAREA>
<?php
//if ( ($sit_patrimoniale==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?></br>
								date naissance mr

<TEXTAREA NAME="date_naissance_mr" COLS=20 ROWS=1><?php echo $date_naissance_mr ; ?></TEXTAREA>
<?php
//if ( ($date_naissance_mr==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br><br>

Type contrat
<TEXTAREA NAME="type_revenu_mr" COLS=15 ROWS=1><?php echo $type_revenu_mr ; ?></TEXTAREA>
<?php
//if ( ($type_revenu_mr==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?><br>
Profession :

<TEXTAREA NAME="profession1" COLS=20 ROWS=1><?php echo $profession1 ; ?></TEXTAREA>
<?php
//if ( ($profession1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>Revenus :
<TEXTAREA NAME="montant_revenu_mr" COLS=8 ROWS=1><?php echo $montant_revenu_mr ; ?></TEXTAREA>
<?php
//if ( ($montant_revenu_mr==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>
depuis  :

<TEXTAREA NAME="ancien1" COLS=8 ROWS=1><?php echo $ancien1 ; ?></TEXTAREA>
<?php
//if ( ($ancien1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>


	</br></br>
Revenus autres

<TEXTAREA NAME="autresRevenus1" COLS=8 ROWS=1><?php echo $autresRevenus1 ; ?></TEXTAREA>
<?php
//if ( ($autresRevenus1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>								
		
<TEXTAREA NAME="autresRevenus2" COLS=8 ROWS=1><?php echo $autresRevenus2 ; ?></TEXTAREA>
<?php
//if ( ($autresRevenus2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>								
	<TEXTAREA NAME="autresRevenus3" COLS=8 ROWS=1><?php echo $autresRevenus3 ; ?></TEXTAREA>
<?php
//if ( ($autresRevenus3==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>								
	<TEXTAREA NAME="autresRevenus4" COLS=8 ROWS=1><?php echo $autresRevenus4 ; ?></TEXTAREA>
<?php
//if ( ($autresRevenus4==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>								
	
	










</br></br>
IR1 :

<TEXTAREA NAME="impot1" COLS=8 ROWS=1><?php echo $impot1 ; ?></TEXTAREA>
<?php
//if ( ($impot1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
</br></br>
Banque1

<TEXTAREA NAME="banque1" COLS=15 ROWS=1><?php echo $banque1 ; ?></TEXTAREA>
<?php
//if ( ($banque1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>		



Banque2

<TEXTAREA NAME="banque2" COLS=15 ROWS=1><?php echo $banque2 ; ?></TEXTAREA>
<?php
//if ( ($banque2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>						
								
							
	
	</br></br>
Charges :
	<TEXTAREA NAME="chargesMontant" COLS=8 ROWS=1><?php echo $chargesMontant ; ?></TEXTAREA>
<?php
//if ( ($chargesMontant==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
	par mois, CRD : <TEXTAREA NAME="ChargesCrd" COLS=8 ROWS=1><?php echo $ChargesCrd ; ?></TEXTAREA>
<?php
//if ( ($ChargesCrd==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>	fin le <TEXTAREA NAME="ChargesFin" COLS=8 ROWS=1><?php echo $ChargesFin ; ?></TEXTAREA>
<?php
//if ( ($ChargesFin==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>	<br>
Autres Charges : 	
<TEXTAREA NAME="autresCharges1" COLS=8 ROWS=1><?php echo $autresCharges1 ; ?></TEXTAREA>
<?php
//if ( ($autresCharges1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>				

<TEXTAREA NAME="autresCharges2" COLS=8 ROWS=1><?php echo $autresCharges2 ; ?></TEXTAREA>
<?php
//if ( ($autresCharges2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>				
	
<TEXTAREA NAME="autresCharges3" COLS=8 ROWS=1><?php echo $autresCharges3 ; ?></TEXTAREA>
<?php
//if ( ($autresCharges3==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>				
	
<TEXTAREA NAME="autresCharges4" COLS=8 ROWS=1><?php echo $autresCharges4 ; ?></TEXTAREA>
<?php
//if ( ($autresCharges4==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>				
	
<TEXTAREA NAME="autresCharges5" COLS=8 ROWS=1><?php echo $autresCharges5 ; ?></TEXTAREA>
<?php
//if ( ($autresCharges5==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>				
		
								
								
								
 </td>

   <td><b> Madame</br>
Conjoint titre :

<TEXTAREA NAME="titre2" COLS=8 ROWS=1><?php echo $titre2 ; ?></TEXTAREA>
<?php
//if ( ($titre2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
</br></br>conjoint nom :

<TEXTAREA NAME="Nom2" COLS=15 ROWS=1><?php echo $Nom2 ; ?></TEXTAREA>
<?php
//if ( ($Nom2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>


<TEXTAREA NAME="nomJeuneFille" COLS=8 ROWS=1><?php echo $nomJeuneFille ; ?></TEXTAREA>
<?php
//if ( ($nomJeuneFille==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>


</br></br>conjoint prenom :

<TEXTAREA NAME="Prenom2" COLS=15 ROWS=1><?php echo $Prenom2 ; ?></TEXTAREA>
<?php
//if ( ($Prenom2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

</br></br>conjoint date naissance :

<TEXTAREA NAME="date_naissance_mme" COLS=15 ROWS=1><?php echo $date_naissance_mme ; ?></TEXTAREA>
<?php
//if ( ($date_naissance_mme==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

</br></br>Type contrat :

<TEXTAREA NAME="type_revenu_mme" COLS=8 ROWS=1><?php echo $type_revenu_mme ; ?></TEXTAREA>
<?php
//if ( ($type_revenu_mme==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>
Profession :

<TEXTAREA NAME="profession2" COLS=15 ROWS=1><?php echo $profession2 ; ?></TEXTAREA>
<?php
//if ( ($profession2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>Revenus
<TEXTAREA NAME="montant_revenu_mme" COLS=8 ROWS=1><?php echo $montant_revenu_mme ; ?></TEXTAREA>
<?php
//if ( ($montant_revenu_mme==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>
depuis  :

<TEXTAREA NAME="ancien2" COLS=8 ROWS=1><?php echo $ancien2 ; ?></TEXTAREA>
<?php
//if ( ($ancien2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>




</br></br>IR2 :

<TEXTAREA NAME="impot2" COLS=8 ROWS=1><?php echo $impot2 ; ?></TEXTAREA>
<?php
//if ( ($impot2==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>






 </tr> </td>

   <td></br></br>
   -------------------------------------------------------------------------------------------</br>
   <b> Caracteristiques du financement </br>
  
<br><br>
Commentaires sur le dossier (saut de charges - frais forcage - rejet) : </b>
<TEXTAREA NAME="demand_comment" COLS=50 ROWS=4><?php echo $demand_comment ; ?></TEXTAREA>
<?php
//if ( ($demand_comment==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>



  
  <br><br> delai :

<TEXTAREA NAME="delai" COLS=25 ROWS=1><?php echo $delai ; ?></TEXTAREA>
<?php
//if ( ($delai==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
   &nbsp;&nbsp;&nbsp;&nbsp;Type de bien : 
 <TEXTAREA NAME="achat" COLS=25 ROWS=1><?php echo $achat ; ?></TEXTAREA>
<?php
//if ( ($achat==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
   

<br><br>
Duree choisie : 

<TEXTAREA NAME="demand_duree" COLS=8 ROWS=1><?php echo $demand_duree ; ?></TEXTAREA>
<?php
//if ( ($demand_duree==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
&nbsp;&nbsp;&nbsp;&nbsp;
Adi
<TEXTAREA NAME="demand_adi" COLS=8 ROWS=1><?php echo $demand_adi ; ?></TEXTAREA>
<?php
//if ( ($demand_adi==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
&nbsp;&nbsp;&nbsp;&nbsp;
Adi2
<TEXTAREA NAME="demand_adi1" COLS=8 ROWS=1><?php echo $demand_adi1 ; ?></TEXTAREA>
<?php
//if ( ($demand_adi1==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br><br>

<br><br>
Achat
<TEXTAREA NAME="invest" COLS=8 ROWS=1><?php echo $invest ; ?></TEXTAREA>
<?php
//if ( ($invest==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

&nbsp;&nbsp;&nbsp;&nbsp;Travaux
<TEXTAREA NAME="travaux" COLS=8 ROWS=1><?php echo $travaux ; ?></TEXTAREA>
<?php
//if ( ($travaux==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

&nbsp;&nbsp;&nbsp;&nbsp;Notaire
<TEXTAREA NAME="notaire" COLS=8 ROWS=1><?php echo $notaire ; ?></TEXTAREA>
<?php
//if ( ($notaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
&nbsp;&nbsp;&nbsp;&nbsp;Agence
<TEXTAREA NAME="agence" COLS=8 ROWS=1><?php echo $agence ; ?></TEXTAREA>
<?php
//if ( ($agence==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

<br>Cout garantie
<TEXTAREA NAME="demand_cout_garantie" COLS=8 ROWS=1><?php echo $demand_cout_garantie ; ?></TEXTAREA>
<?php
//if ( ($demand_cout_garantie==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>

&nbsp;&nbsp;&nbsp;&nbsp;Apport
<TEXTAREA NAME="apport" COLS=8 ROWS=1><?php echo $apport ; ?></TEXTAREA>
<?php
//if ( ($apport==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>
<br>
 Montant du mandat :

<TEXTAREA NAME="prix" COLS=20 ROWS=1><?php echo $prix ; ?></TEXTAREA>
<?php
//if ( ($prix==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?> 
<?php
//if ( ($id_partenaire==""  ) and ($cree_1 == "ok"  or $ko_input == "ko" ) )
?>














</td>






</div>

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
				$idMessage=$row_kpe_1->id;
				$origine=$row_kpe_1->origine;
				$message=$row_kpe_1->message;
				$timekape_message=$row_kpe_1->timekape;
?>
<br />
<br/>
<div class="bkpe_annonce_etiquette">
Fichier du <?php echo $origine ;  ?> ( <?php echo date("d.m.Y", "$timekape_message");  ?>  )
<!-- <font color="#FF0000">*</font>  -->:
</div>
<div class="bkpe_annonce_input">
<!-- <a href="../membre/upload_france_fr/<?php  echo $message ;   ?>" target="_blank"><span style="font-size:12px;  color:blue;"><?php echo $message ;     ?></span></a> -->

<a href="../membre/upload_france_fr/<?php  echo $message ;   ?>" target="_blank"><span style="font-size:12px;  color:blue;"><?php echo $message ; ?><?php echo " / " ?><a href="../controler/supprimerFichier.php?idMessage=<?php echo $idMessage ?>" class="btn btn-danger danger">Supprimer</a> </span></a> 
 
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
	
}
else 
	{
		echo "Accés Interdit";
	}
//************* fin corps du traitement  ********




//*************************************  
  

}
?>
</div>

<br/>
<br/>
<br/>