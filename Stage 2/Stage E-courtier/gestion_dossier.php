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
  echo " <br />Cliquez sur une r&eacute;f&eacute;rence pour aller au dossier <br /> " ;
  // echo 'Votre rang : <b>'.safest($_SESSION['_rank']).'</b><br><br />';
  
  ?>
  <a href="./"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Retour </a><br>
 <a href="./deconnect.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Deconnexion</a><br><br>
 <br />
 
 <?php
  echo "Choix actuel : mode de gestion des dossiers en cours <br /><br /> " ;

//*************************************
//****** debut liste des dossiers en cours *********




  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe where   id_partenaire ='$id_courant' order by timekape_last_modif desc");
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by timekape_last_modif desc");
  
  
  $result_1 = mysql_query("SELECT * FROM dossiers_bkpe where (  statut != 'contrat_resilie' and statut != 'archivage' and statut != 'corbeille' and statut != 'demande_refusee' and statut != 'contrat_en_cours' and statut != 'dossier_finalise' and statut != 'Loyers_contrat_GRL_SA' and statut != 'Loyers_contrat_GLI_SA' and statut != 'Loyers_contrat_GRL_Interassurances' and statut != 'Loyers_contrat_GLI_Insured') order by timekape_last_modif desc")  ;
  
	$id_partenaire_recherche=$_COOKIE["myforum_login_guides1"];
	
	$result_111 = mysql_query("SELECT voir_dossiers FROM partenaires where   id ='$id_partenaire_recherche'");
				$row_kpe_11 = mysql_fetch_object ($result_111);
				$voir_dossiers=$row_kpe_11->voir_dossiers;
				
  
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by id_partenaire desc");
	if ($voir_dossiers=="oui")
	{
	$nbr_analyse=mysql_num_rows($result_1) ;
	if ($nbr_analyse== "0" ) 
	{
	echo "Pas de dossiers en cours ! " ;
	
	}
	else
	{
	
	//******************************************************
	$bgcoul = array("#add8e6", "#deb887");
		$i=0;

		echo "<table align='center'>";
		
	?>	
	
	
<!-- <br/> -->
		<caption><?php	echo '<h4> ','Vos dossiers en cours '.'<br />'.' ',' </h4>';  echo 'cliquez sur ID ou reference pour pouvoir consulter ou modifier le dossier ' ;
		?></caption>

		<thead> <!-- En-tête du tableau -->
       <tr>
           
				
		<!-- <th><?php	//echo 'date de cr&eacute;ation';		
		?></th>  -->
		
		<th><?php	echo 'date <br/>de modification';		
		?></th> 
		
		<th><?php	echo 'ID';		
		?></th> 
		
		<th><?php	echo 'reference';		
		?></th>		
		
		<th><?php	echo 'nom';		
		?></th>
		
		<th><?php	echo 'prenom';		
		?></th>
		
		<th><?php	echo 'telephone';		
		?></th>
		
		<th><?php	echo 'portable';		
		?></th>
		
		<th><?php	echo 'categorie';		
		?></th>
		
		<th><?php	echo 'statut';		
		?></th>  
		
		<th><?php	echo 'partenaire';		
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
	
	
	$id_client=$row_kpe->id_client;
	
	$result_11 = mysql_query("SELECT * FROM clients where   id ='$id_client'  ");
				$nbr_analyse=mysql_num_rows($result_11) ;
				if ( $nbr_analyse != "1" ) 
				{ $nom = "0" ; $prenom = "0" ; $tel = "rien" ; $portable = "rien" ;}
				else
				{
				$row_kpe_1 = mysql_fetch_object ($result_11);
				
				$e_mail=$row_kpe_1->email;
				$nom=$row_kpe_1->nom;
				$prenom=$row_kpe_1->prenom;
				$code_postal=$row_kpe_1->code_postal;
				$id_partenaire=$row_kpe_1->id_partenaire;
				$tel=$row_kpe_1->tel;
				$portable=$row_kpe_1->portable;
				}
				
	if ($id_partenaire =="" or $id_partenaire == 0) { $id_partenaire = 1 ; }
	
	$result_111 = mysql_query("SELECT * FROM partenaires where   id ='$id_partenaire' or id_apporteur='$id_partenaire' ");
				$nbr_analyse=mysql_num_rows($result_111) ;
				if ( $nbr_analyse != "1" ) 
				{ $nom_partenaire = $row_kpe_11->nom; $prenom_partenaire = $row_kpe_11->prenom; $enseigne_partenaire = $row_kpe_11->enseigne; $voir_dossiers=$row_kpe_11->voir_dossiers; $modification_dossiers=$row_kpe_11->modification_dossiers;}
				else
				{
				$row_kpe_11 = mysql_fetch_object ($result_111);
				$nom_partenaire=$row_kpe_11->nom;
				$prenom_partenaire=$row_kpe_11->prenom;
				$enseigne=$row_kpe_11->enseigne;
				$voir_dossiers=$row_kpe_11->voir_dossiers;
				$modification_dossiers=$row_kpe_11->modification_dossiers;
				
				}
	
	
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
		
if ( $id_courant == $id_partenaire )	
{	
	
   echo "<tr  bgcolor=".$bgcoul[$i%2].">" ;
   ?>
 
<!-- <td><?php //echo $date_colle ; ?></td> -->
<td><?php echo $last_date_colle ; ?></td>

<!-- <td><?php echo $id_affiche ; ?></td>  -->

<td style=max-width:300px >

<a href="./validate_update_dossier_update_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo $id_affiche ;   ?></span></a>

</td>

<!-- ************************************************************* -->


<!-- ************************************************************* -->



<!-- ************************************************************* -->
<td style=max-width:300px >

<a href="./validate_update_dossier_update_fr.php?timekape=<?php echo $timekape ;   ?>"><span style="font-size: 12px; font-weight: bold;"><?php echo $timekape ;   ?></span></a>

</td>

<td><?php echo $nom ; ?></td>

<td><?php echo $prenom ; ?></td>

<td><?php echo $tel ; ?></td>
<td><?php echo $portable ; ?></td>

<td><?php echo $identifiant_colle ; ?></td>

<td><?php echo $statut ; ?></td>


<td><?php echo $prenom_partenaire ; ?> <?php echo $nom_partenaire ; ?></td>



<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

<!-- ************************************************************* -->

   

<?php
  echo "</tr>";
  }
   
   $i++;
}
echo "</table>";
  

	
	
	//***************************************************
	
	}

	}
	
	else 
	{
		echo "Accés Interdit";
	}

//************** fin liste des dossiers en cours *****




//*************************************  
  

}
?>
</div>

<br/>
<br/>
<br/>

