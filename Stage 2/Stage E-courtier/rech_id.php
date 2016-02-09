<?php
define('MyPHPForum',true);
  
include('mysql.php');
include('config.inc.php');
//include("includes/fonction.sys.php");
include('fonctions.php');
  
include('headers_sans_image_fr.php');


include_once("fckeditor/fckeditor.php") ;


//if(!isset($_SESSION["_pseudo"]) || !isset($_SESSION["_mdp"]))
if((!isset($_COOKIE["myforum_login"]))OR(!isset($_COOKIE["myforum_pass"])))
{
  echo "<center><br><br>Vous devez vous identifier pour accéder à cette page</center>";
  exit();
}
else
{


  //Si on est bien loguer, on affiche le reste
  $pseudo = mysqlsafe($_SESSION['_pseudo']);
  $mdp = mysqlsafe($_SESSION['_mdp']);
  
  // $requete=mysql_query("SELECT * FROM table_3_evenement ");
  $result_1 = mysql_query("SELECT * FROM table_1_textes where nom_texte='header'");
$row_kpe_1 = mysql_fetch_object ($result_1);
$texte_accueil_1=$row_kpe_1->corps_texte;
  
mysql_close(); // Déconnexion de MySQL 
  

  echo '<div class="conteiner">';
  echo '<br><br>Bonjour <b>'.safest($_SESSION['_pseudo']).'</b><br>';
  echo "Vous êtes en mode de changement du header  <br /> et pouvez modifier les données suivantes  : <br /> " ;
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>
  <a href="./"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Retour </a><br>
 <a href="./deconnect.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Deconnexion</a><br><br>
 <br />
 
  
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

$idT=$_POST['id'];
$categorie=$_POST['Select1'];
$recherche = $bdd->query('SELECT * FROM dossiers_bkpe where id_partenaire="'.$idT.'" and categorie="'.$categorie.'"');
while ($donnees = $recherche->fetch())
{
	$id_client=$donnees['id_client'];
	$timekape=$donnees['timekape'];
	$statut=$donnees['statut'];
	$message=$donnees['message'];
	
	$recherche = $bdd->query('SELECT * FROM clients where id="'.$id_client.'"');
	while ($donnees = $recherche->fetch())
	{	
		echo '<table bgcolor="#FFFFFF">'."\n";
		echo '<tr>';
		echo '<td bgcolor="#669999"><b><u>Timekape</u></b></td>';
		echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';
		echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';
		echo '<td bgcolor="#669999"><b><u>Statut</u></b></td>';
		echo '<td bgcolor="#669999"><b><u>Message</u></b></td>';
		echo '</tr>'."\n";
		$reponse2 = $bdd->query('SELECT * FROM dossiers_bkpe where id_partenaire="'.$idT.'" and categorie="'.$categorie.'" order by statut');
		while ($donnees = $reponse2->fetch())
			{
				$id_client=$donnees['id_client'];
				$timekape=$donnees['timekape'];
				$statut=$donnees['statut'];
				$message=$donnees['message'];
				
				$recherche = $bdd->query('SELECT * FROM clients where id="'.$id_client.'"');
				if ($donnees = $recherche->fetch())
				{
					$nom=$donnees['nom'];
					$prenom=$donnees['prenom'];
				}
				
				echo '<tr>';
				echo '<td bgcolor="#CCCCCC"><a href="./validate_update_dossier_update_fr.php?timekape='.$timekape.'">'.$timekape.'</a></td>';
				echo '<td bgcolor="#CCCCCC">'.$nom.'</td>';
				echo '<td bgcolor="#CCCCCC">'.$prenom.'</td>';
				echo '<td bgcolor="#CCCCCC">'.$statut.'</td>';
				echo '<td bgcolor="#CCCCCC">'.$message.'</td>';
				echo '</tr>'."\n";
			}
		$reponse2->CloseCursor();
		echo '</table>'."\n";
	}
	
	
}

  
}
?>
</div>



