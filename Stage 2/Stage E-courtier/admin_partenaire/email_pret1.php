

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
  $pseudo = mysqlsafe($_SESSION['_pseudo']);
  $mdp = mysqlsafe($_SESSION['_mdp']);
  
  $id_courant = $_COOKIE["myforum_login_guides1"] ;
  $e_mail = $_COOKIE["myforum_pass_guides1"] ;
  

  echo '<div class="conteiner">';
  echo '<br><br>Bonjour <b>'.safest($_SESSION['_pseudo']).'</b><br>';
  echo "Vous êtes en mode d'envoi d'un e-mail pour un client  <br /> et pouvez modifier les données suivantes  : <br /> " ;
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>
  <a href="./"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Retour </a><br>
 <a href="./deconnect.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Deconnexion</a><br><br>
 <br />
 
 <?php
  echo "Choix actuel : mode d'envoi d'un e-mail pour un client <br /><br /> " ;
//******
//******
//******

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

  
  }

//**** il faut trouver le timekape du client fin ****


//***** debut liste des clients  *****
//$result_1 = mysql_query("SELECT * FROM clients where ( timekape = '$timekape' ) order by timekape_last_modif desc");
  
$result_1 = mysql_query("SELECT * FROM clients where ( id = '$id_client' ) order by timekape_last_modif desc");
   
  
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by id_partenaire desc");
	$nbr_analyse=mysql_num_rows($result_1) ;
	$nom_11=$row_kpe_11->nom;	
$prenom_11=$row_kpe_11->prenom;	
$tel_11=$row_kpe_11->tel1;

	if ($nbr_analyse== "0" ) 
	{
	echo "Pas de clients en cours ! " ;
	
	}
	else
	{
	$row_kpe = mysql_fetch_object ($result_1);
  
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
 
	
	//$timekape=$row_kpe->timekape;
	
	
	
	$id=$row_kpe->id;
	
	$id_affiche=$id   ;
	
			
				$e_mail=$row_kpe->email;
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
	
	
	
	$last_timekape=$row_kpe->timekape_last_modif;
	if ($last_timekape=="vide"  )  { $last_timekape=0 ; }
	
	
	
	//$date_colle = date("d.m.Y", "$timekape");
	//if ($last_timekape!=0) 
	//{
	//$last_date_colle = date("d.m.Y", "$last_timekape");
	//}
	//else
	//{
	//$last_date_colle = "nihil" ;
	//}
	
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

include('send_mail_pret1.php');



//**** mise en statut dossier finalisé debut ****

$statut = "mandat_envoye"    ;
$timekape_new = time() ;

mysql_query("UPDATE dossiers_bkpe  SET   statut='$statut' WHERE timekape='$timekape_12'") or die('Error : '.mysql_error());
mysql_query("UPDATE dossiers_bkpe  SET   timekape_last_modif='$timekape_new' WHERE timekape='$timekape_12'") or die('Error : '.mysql_error());
 

//**** mise en statut dossier finalisé fin ****

echo "<br>" ;
echo "E mail  envoy&eacute; au client et statut Mandat envoye " ;
echo "<br>" ;

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

<br/>