<?php
define('MyPHPForum',true);
  
include('mysql.php');
include('config.inc.php');
//include("includes/fonction.sys.php");
include('fonctions.php');

include("connexion.php");
  
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
<br/>

























<?php



//************ debut liste des dossiers en cours *******
//**********************************************
//echo "Liste des dossiers en cours <br /><br /> " ;

if (empty($_POST['nom']))
{
	echo "<script type='text/javascript'>document.location.replace('./2016P3_modif_client.php');</script>";
}

else
{
	echo'<p><a href="./2016P3_modif_client.php"> > Faire une nouvelle recherche</a></p>';

$nom= $_POST['nom'];

$connect = $_COOKIE;

	$result_1 = $bdd->query('SELECT * FROM clients WHERE nom ="'.$nom.'"');
	if ($donnees = $result_1->fetch()) 
	{
		
				
				$id_client=$donnees['id'];
				$e_mail=$donnees['email'];
				$nom=$donnees['nom'];
				$prenom=$donnees['prenom'];
				$code_postal=$donnees['code_postal'];	
				$idT=$donnees['id'] ;		
				$id_client=$donnees['id_client'];



	$result_1 = mysql_query("SELECT * FROM dossiers_bkpe where id_client='$idT'  order by timekape_last_modif desc");
	$nbr_analyse=mysql_num_rows($result_1) ;
	
	//******************************************************
	$bgcoul = array("#add8e6", "#deb887");
		$i=0;

		echo "<table align='center'>";

	?>	
<!-- <br/> -->
		<caption><?php	echo '<h4> ','Liste du contenu de la table des dossiers en cours '.'<br />'.' actuellement dans la base de donn&eacute;es',' </h4>';  echo 'cliquez sur ID ou reference pour pouvoir consulter ou modifier le dossier ' ;
		?></caption>

Nombre de fiches clients : 	<?php echo $nbr_analyse; ?>
 


		<thead> <!-- En-tête du tableau -->
       <tr>
           
				
		<!-- <th><?php	//echo 'date de cr&eacute;ation';		
		?></th>  -->
		
		<th><?php	echo 'date <br/>de modification';		
		?></th> 
		
		<th><?php	echo 'nom';		
		?></th> 
		
		<th><?php	echo 'prenom';		
		?></th> 
		
		<th><?php	echo 'id_client';		
		?></th> 
		
		<th><?php	echo 'ID';		
		?></th> 
		
		<th><?php	echo 'reference';		
		?></th>
		
		<th><?php	echo 'categorie';		
		?></th>
		
		<th><?php	echo 'statut';		
		?></th>  
		
				
       </tr>
   </thead>

<?php
$result_1 = $bdd->query('SELECT * FROM clients WHERE nom ="'.$nom.'"');
while ($donnees = $result_1->fetch()) 
{	
				$id_client=$donnees['id'];
				$e_mail=$donnees['email'];
				$nom=$donnees['nom'];
				$prenom=$donnees['prenom'];
				$code_postal=$donnees['code_postal'];	
				$idT=$donnees['id'] ;		
				$id_client=$donnees['id_client'];
				$id_partenaire = $_COOKIE["myforum_login_guides1"];
				
$result_2 = $bdd->query('SELECT * FROM dossiers_bkpe where id_client="'.$idT.'" and id_partenaire="'.$id_partenaire.'" order by timekape_last_modif desc');
if ($donnees = $result_2->fetch())
{
	$result_7 = mysql_query("SELECT * FROM dossiers_bkpe where id_client='$idT' order by timekape_last_modif desc");
	$row_kpe = mysql_fetch_object ($result_7);
  
 
	
	$timekape=$row_kpe->timekape;
	
	
	
	$id=$row_kpe->id;
	
	$id_affiche=$id   ;
	
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
	
	//$identifiant=$row_kpe->nr_guidage;
	$identifiant=$row_kpe->categorie;
	$identifiant_colle="$identifiant";
	
	$statut=$row_kpe->statut;
	
		
	
	
   echo "<tr  bgcolor=".$bgcoul[$i%2].">" ;
   ?>
 
<!-- <td><?php //echo $date_colle ; ?></td> -->
<td><?php echo $last_date_colle ; ?></td>

<td><?php echo $nom ; ?></td>

<td><?php echo $prenom ; ?></td>

<td><?php echo $idT ; ?></td>

<td style=max-width:300px >

<a href="./validate_update_dossier_update_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo $timekape ;   ?></span></a>

</td>

<td style=max-width:300px >

<a href="./validate_update_dossier_update_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo $id_affiche ;   ?></span></a>

</td>



<td><?php echo $identifiant_colle ; ?></td>


<td><?php echo $statut ; ?></td>

<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

  

<?php
  echo "</tr>";
   
   $i++;
}}
echo "</table>";
  
	
   

	
	
	//***************************************************
				
	}
	
	
	else

	{
		echo "Aucun dossiers en cours ! " ;
	}


//************** fin liste des dossiers en cours *****
//********************************************

//************* fin corps du traitement  ********
				
				}
?>
</td>
</tr>
</table>
<?php
}
//include('formulaire_inscript_client_short.php');

include('../footer.php');
?>

</body>