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
<br/>

























<?php



//************ debut liste des dossiers en cours *******
//**********************************************
//echo "Liste des dossiers en cours <br /><br /> " ;

if (empty($_POST['mail']))
{
	echo "<script type='text/javascript'>document.location.replace('./2016P3_modif_client.php');</script>";
}

else
{
	echo'<p><a href="./2016P3_modif_client.php"> > Faire une nouvelle recherche</a></p>';

$email= $_POST['mail'];

$connect = $_COOKIE;


  $result_1 = mysql_query("SELECT * FROM clients WHERE email ='$email' ");
	$nbr_analyse=mysql_num_rows($result_1) ;
	if ($nbr_analyse= "0" ) 
	{
	echo "Aucun de dossiers en cours ! " ;}
	else

			{
				$row_kpe_1 = mysql_fetch_object ($result_1);
				$id_client=$row_kpe_1->id;
				$e_mail=$row_kpe_1->email;
				$nom=$row_kpe_1->nom;
				$prenom=$row_kpe_1->prenom;
				$code_postal=$row_kpe_1->code_postal;
				$nom=$nom	;	
				$idT=$row_kpe_1->id ;		
				}
				$id_client=$row_kpe_1->id_client;
		 		$nom=$nom ;



  $result_1 = mysql_query("SELECT * FROM dossiers_bkpe where id_client='$idT'  order by timekape_last_modif desc");
	$nbr_analyse=mysql_num_rows($result_1) ;
	if ($nbr_analyse== "" ) 
	{
	echo "Aucun de dossiers en cours ! " ;}
	else
	{
	
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
 while($i<mysql_num_rows($result_1)) 
{
   $row_kpe = mysql_fetch_object ($result_1);
  
 
	
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
}
echo "</table>";
  
	
   

	
	
	//***************************************************
	
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