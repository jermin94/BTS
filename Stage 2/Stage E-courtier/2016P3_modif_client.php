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
  echo "Faire une recherche de client en fonction de son Mail, son Nom ou son identifiant : <br /> " ;
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>


<br/>
<a href="./">
Retour Accueil 
</a>
<br/><br/>

























<?php


//************ debut liste des dossiers en cours *******
//**********************************************
//echo "Liste des dossiers en cours <br /><br /> " ;

	echo '<form action="./recherche_mail.php?PHPSESSID='.$_GET['PHPSESSID'].'" method="post">
					<label for="mail" class="float">Mail :</label> <input type="text" name="mail" id="mail" size="30" /><br><br>
					<div class="center"><input type="submit" value="Rechercher" /></div>
		</form>';
	
	echo '<form action="./recherche_nom.php?PHPSESSID='.$_GET['PHPSESSID'].'" method="post">
					<label for="nom" class="float">Nom :</label> <input type="text" name="nom" id="nom" size="30" /><br><br>
					<div class="center"><input type="submit" value="Rechercher" /></div>
		</form>';
	
	echo '<form action="./recherche_id.php?PHPSESSID='.$_GET['PHPSESSID'].'" method="post">
					<label for="id" class="float">ID :</label> <input type="text" name="id" id="id" size="30" /><br><br>
					<div class="center"><input type="submit" value="Rechercher" /></div>
		</form>';
		
	echo '<form action="./recherche_tel.php?PHPSESSID='.$_GET['PHPSESSID'].'" method="post">
					<label for="tel" class="float">Téléphone Portable :</label> <input type="text" name="tel" id="tel" size="30" /><br><br>
					<div class="center"><input type="submit" value="Rechercher" /></div>
		</form>';
		
	echo '<form action="./recherche_dossier.php?PHPSESSID='.$_GET['PHPSESSID'].'" method="post">
					<label for="dossier" class="float">ID dossier :</label> <input type="text" name="dossier" id="dossier" size="30" /><br><br>
					<div class="center"><input type="submit" value="Rechercher" /></div>
		</form>';


?>
<?php
}
//include('formulaire_inscript_client_short.php');

include('../footer.php');
?>

</body>