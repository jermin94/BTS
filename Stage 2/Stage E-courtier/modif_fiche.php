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
  echo "<center><br><br>Vous devez vous identifier pour acceder à cette page</center>";
  exit();
}
else
{
 

  //Si on est bien loguer, on affiche le reste
  $pseudo = mysqlsafe($_SESSION['_pseudo']);
  $mdp = mysqlsafe($_SESSION['_mdp']);
 

  
  

  echo '<div class="conteiner">';
  echo '<br><br>Bonjour <b>'.safest($_SESSION['_pseudo']).'</b><br>';
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>


<br/>
<a href="./">
Retour Accueil 
</a>
<br/><br/>

<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer
?>

<?php

$idT=$_COOKIE["myforum_login_guides1"];
$recherche = $bdd->query('SELECT * FROM partenaires where id="'.$idT.'"');
if ($donnees = $recherche->fetch())
{
	$slogan=$donnees['slogan'];
	$zone=$donnees['zone'];
	$offre=$donnees['offres'];

	echo '<h3>Vos informations actuels :</h3></br>';
	echo 'Slogan : ';
	echo $slogan;
	echo '</br>Zone : ';
	echo $zone;
	echo '</br>Offre : ';
	echo $offre;
	echo '</br>';

}

echo '<h3>Changer ces informations :</h3></br>';

	echo '<form method="POST" action="envoi_image.php" enctype="multipart/form-data">
		 <!-- On limite le fichier à 100Ko -->
		 <input type="hidden" name="MAX_FILE_SIZE" value="100000">
		 Fichier : <input type="file" name="avatar">
		 <input type="submit" name="envoyer" value="Envoyer le fichier">
	</form>';


if (empty($_POST['slogan']))
{
	echo'<form action="modif_fiche.php" method="post" name="Contact">
				<label for="slogan" class="float">Slogan :</label> <input type="text" name="slogan" id="slogan" size="30" /> <br><br>
				<div class="center"><input type="submit" value="Envoyer" /></div>
		</form>';
}
else
{
	$slogan=$_POST['slogan'];
	$reponse1 = $bdd->query('UPDATE partenaires SET slogan = "'.$slogan.'" where id="'.$idT.'"');
	$reponse1->CloseCursor();
}

if (empty($_POST['zone']))
{
	echo'<form action="modif_fiche.php" method="post" name="Contact">
				<label for="zone" class="float">Zone :</label> <input type="text" name="zone" id="zone" size="30" /> <br><br>
				<div class="center"><input type="submit" value="Envoyer" /></div>
		</form>';
}
else
{
	$zone=$_POST['zone'];
	$reponse1 = $bdd->query('UPDATE partenaires SET zone = "'.$zone.'" where id="'.$idT.'"');
	$reponse1->CloseCursor();
}

if (empty($_POST['offres']))
{
	echo'<form action="modif_fiche.php" method="post" name="Contact">
				<label for="offres" class="float">Offres :</label> <input type="text" name="offres" id="offres" size="30" /> <br><br>
				<div class="center"><input type="submit" value="Envoyer" /></div>
		</form>';
}
else
{
	$offres=$_POST['offres'];
	$reponse1 = $bdd->query('UPDATE partenaires SET offres = "'.$offres.'" where id="'.$idT.'"');
	$reponse1->CloseCursor();
}

}
//include('formulaire_inscript_client_short.php');

include('../footer.php');
?>

</body>