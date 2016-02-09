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
  
  $id_courant = $_COOKIE["myforum_login_guides1"] ;
  $e_mail = $_COOKIE["myforum_pass_guides1"] ;
  

  echo '<div class="conteiner">';
  echo '<br><br>Bonjour <b>'.safest($_SESSION['_pseudo']).'</b><br>';
  echo "Vous êtes en mode de cr&eacute;ation d'un courrier Lettre Infos Préalble  <br />  " ;
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>
  <a href="./"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Retour </a><br>
 <a href="./deconnect.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Deconnexion</a><br><br>
 <br />
 
 <?php
  echo "Choix actuel : mode de cr&eacute;ation d'un courrier Lettre Infos Préamable <br /><br /> " ;
//******
//******
//******

if ( !isset($_GET['timekape'])) { $timekape = "" ;  } else { $timekape=$_GET['timekape'] ; }
if ( !isset($_POST['timekape'])) {  } else { $timekape=$_POST['timekape'] ; }

if ( !isset($_GET['timekape'])) { $timekape_12 = "" ;  } else { $timekape_12=$_GET['timekape'] ; }

//**** il faut trouver le timekape du client debut ****

$result_12 = mysql_query("SELECT * FROM dossiers_bkpe where ( timekape = '$timekape_12' ) order by timekape_last_modif desc");
 $nbr_analyse_12=mysql_num_rows($result_12) ;
	if ($nbr_analyse_12== "0" ) 
	{
	echo "Pas de dossier en cours ! " ;
	
	}
	else
	{
	$row_kpe_12 = mysql_fetch_object ($result_12);
  $id_client=$row_kpe_12->id_client;
  $prix=$row_kpe_12->prix;

  
  }

//**** il faut trouver le timekape du client fin ****











//***** debut liste des clients  *****
//$result_1 = mysql_query("SELECT * FROM clients where ( timekape = '$timekape' ) order by timekape_last_modif desc");
  
$result_1 = mysql_query("SELECT * FROM clients where ( id = '$id_client' ) order by timekape_last_modif desc");  
  
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by id_partenaire desc");
	$nbr_analyse=mysql_num_rows($result_1) ;
	if ($nbr_analyse== "0" ) 
	{
	echo "Pas de clients en cours ! " ;
	
	}
	else
	{
	$row_kpe = mysql_fetch_object ($result_1);
  
 
	
	//$timekape=$row_kpe->timekape;
	
	
	
	$id=$row_kpe->id;
	
	$id_affiche=$id   ;
	
			
				$e_mail=$row_kpe->email;
				$m_mme_mlle=$row_kpe->m_mme_mlle;
				$nom=$row_kpe->nom;
				$prenom=$row_kpe->prenom;
				$code_postal=$row_kpe->code_postal;
				$id_partenaire=$row_kpe->id_partenaire;
				$tel=$row_kpe->tel;
				$portable=$row_kpe->portable;
				
				$adresse=$row_kpe->adresse;
				$code_postal=$row_kpe->code_postal;
				$ville=$row_kpe->ville;
				$pays=$row_kpe->pays;
	
$result_11 = mysql_query("SELECT * FROM partenaires where ( id = '$id_partenaire' ) ");
$row_kpe_11 = mysql_fetch_object ($result_11);	
$nom_11=$row_kpe_11->nom;	
$prenom_11=$row_kpe_11->prenom;	
$tel_11=$row_kpe_11->tel1;
	
	$last_timekape=$row_kpe->timekape_last_modif;
	if ($last_timekape=="vide"  )  { $last_timekape=0 ; }
	
	
	
	$date_colle = date("d.m.Y", "$timekape");
	if ($last_timekape!=0) 
	{
	$last_date_colle = date("d.m.Y", "$last_timekape");
	}
	else
	{
	$last_date_colle = "nihil" ;
	}
	
////  *******  client existant debut traitement pour texte et image *****
// ***********************************************************************	
	
$test_input_ok = "ok" ;
$test_input_ok1 = "ok" ;
$url_bkpe = $_SERVER['REQUEST_URI'] ;


if ( !isset($_POST['message_new_avant'])) { $message_new_avant = "" ; } else { $message_new_avant=$_POST['message_new_avant'] ; }
if ( !isset($_POST['message_new_apres'])) { $message_new_apres = "" ; } else { $message_new_apres=$_POST['message_new_apres'] ; }

if ( !isset($_POST['logo'])) { $logo_colle = "" ; } else { $logo=$_POST['logo'] ; }
$logo_colle="$logo";
if ($logo_colle == "" ) 
	{
	$logo_colle = "no_logo.jpg" ;
	}

if ( !isset($_POST['inserer'])) { $inserer = "non" ; } else { $inserer=$_POST['inserer'] ; }



if(isset($_POST['Operation_creer']))
{

include('simple_pdf_lip_signature.php'); 

if ($inserer == "oui")
{
$timekape_new = time() ;
$origine = "Lettre Infos Prealable" ;
$fichier_1 = $tititime."-".$numero_visite_calcule.$titime.".pdf"  ;

$query_11="INSERT INTO fichiers_dossiers_bkpe
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id."','".$origine."','".$fichier_1."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
 
 //$message = "" ; 
 //$categorie = "choisir" ;
// $statut = "prise_de_contact" ;
 
 //$query_111="INSERT INTO dossiers_bkpe
//(id,timekape,timekape_last_modif,id_client,id_partenaire,categorie,statut,message)
//VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$id."','".$id_partenaire."','".$categorie."','".$statut."','".$message."')" ;
  
// mysql_query($query_111) or die('Error 2 : '.mysql_error());
 
 include('send_mail_lip.php');
 
}

$_POST['Operation_creer'] = null ;

}


//********  debut operation photo fichiers ******
//*****************************************
$erreur_1 = "" ;
if(isset($_POST['Operation_photo_1']))
{

$timekape_new = time() ;





$avatar= "_1" ;
include('upload_france_fr.php');
$fichier_1 = $fichier ;
$erreur_1 = $erreur ;

if ($erreur_1 == "Upload effectu&eacute; avec succ&egrave;s !" )
{

//mysql_query("UPDATE table_11_partenaires SET   logo='$fichier_1'  WHERE  timekape_orig='$timekape_orig'") 
//or die('Error : '.mysql_error());

$logo_colle = $fichier_1 ;

}

//***** on enleve le flag du submit
$_POST['Operation_photo_1'] = null ;
}

//******** fin operation photo fichiers ******
//***************************************



echo "<br/>" ; 
echo "Courrier Lettre Informations Préalable pour le client : " .$nom."  ".$prenom ;

echo "<br/>" ;
	
?>	
<form class="" name="creation_inscription" action="<?php echo $url_bkpe ; ?>" enctype="multipart/form-data" method="post">
<br/>
<br/>	


<!-- Nouveau message <font color="#FF0000">*</font> :  -->
Ins&eacute;rer le courrier dans le dossier du client ? ou laisser non pour tester d abord :&nbsp;&nbsp;
<br><br>
En cliquant sur oui, vous envoyez un email automatique au client.
<select size="1" name="inserer"> 
<!-- <option selected>Merci de preciser</option>  -->
<option <?php if ($inserer == "oui" ) { echo "selected" ;  }    ?>>oui</option>
<option <?php if ($inserer == "non" ) { echo "selected" ;  }    ?> >non</option> 
</select>
</div>
<div class="bkpe_annonce_input">
<!-- <select size="1" name="inserer"> 
<!-- <option selected>Merci de preciser</option>  -->
<!-- <option>oui</option>
<option selected >non</option> 
</select>  -->

</div>

<br/>
<br/>



<input type="hidden" name="timekape" value=<?php echo $timekape ; ?>> 

&nbsp;&nbsp;&nbsp;<input type="submit" name="Operation_creer" value="R&eacute;aliser pdf !" />

</form>
	
<?php	
////  *******  client existant fin traitement pour texte et image *****
// ***********************************************************************	
	
	}



//***** fin liste des clients  *****
//*****
//*****
//*****
//*************************************
//echo $nom ;
//echo "<br>" ;
//$nom_1 = $nom  ;


//include('simple_gen_pdf_courrier_vierge_new_method.php');

?>
<!-- <IFRAME src="http://www.guides1815.org/admin_guides_bkpe/output/17052012-1337245548.pdf" 
width=800 height=500 scrolling=yes frameborder=1 > </IFRAME> -->


<?php


//*********************  
  

}
?>
</div>

<br/>
<br/>
<br/>