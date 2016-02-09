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
 <form action="rech_id.php" method="post" name="Contact">
		<label for="id" class="float">Id Partenaire :</label> <input type="text" name="id" id="id" size="30" /> <br><br>
		<label for="Select1" class="float">Catégorie :</label>
		<select name="Select1" id="Select1"> 
			<option value="pret">pret</option> 
			<option value="epargne">epargne</option> 
			<option value="assurance">assurance</option> 
			<option value="pierrelocatif">pierrelocatif</option> 
			<option value="grl-gli">grl-gli</option> 
			<option value="pno">pno</option> 
			<option value="Parrainage">Parrainage</option> 
		</select> 
		<div class="center"><input type="submit" value="Envoyer" /></div>
 </form>
</div>

<?php
}
?>