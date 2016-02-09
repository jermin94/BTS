<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Site admin des partenaires e-courtier</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
	
<SCRIPT LANGUAGE="JavaScript" type="text/javascript">


<?php
session_start();
if (!file_exists("mysql.php"))
{
  echo "situation anormale de type 1"."<br/ >"."veuillez contacter le service de BKPE"."<br/ >"."<br/ >" ;
  ?>
  
  <?php
  session_start();
  
  exit();
}
else
{

  //Scripts par Sky sur www.graphiks.net
  //Version public V°0.2 beta
  
  define('MyPHPForum',true);
  
  include('mysql.php');
  include('config.inc.php');
  // include("includes/fonction.sys.php");
  include('fonctions.php');
  
  include('headers_fr.php');


  if(!isset($_SESSION['_pseudo']))
    $id_p = "2";
  else
    $id_p = $_SESSION['_id_p'];

  
  /* connecté ou pas ? */
  //if((!isset($_SESSION["_pseudo"]))OR(!isset($_SESSION["_mdp"])))
  if((!isset($_COOKIE["myforum_login_guides1"]))OR(!isset($_COOKIE["myforum_pass_guides1"])))
  {
    echo '
    <div class="conteiner">
    <table width="100%">
      <tr>
        <td width="60%">
        
          <form method="post" action="login_fr.php">
          <table width="50%" cellspacing="1" border="0">
            <tr>
              <td>Pseudo :</td>
              <td><input type="text" name="pseudo" size="10"></td>
            </tr>
            <tr>
              <td>Mot de passe :</td>
              <td><input type="password" name="mdp" size="15"></td>
            </tr>
            <tr>
              <td><input type="submit" value="Connexion ->"></td>
            </tr>
			</form>
			<tr>
              <td>
			<a href="../index.php"><img  class="cli4" src="../images/logo_header_petit.if">&nbsp;Retour au site public</a>
			</td>
            </tr>
          </table>
          
          
        </td>
        <td align="center">
          
        </td>
      </tr>
    </table>
    </div>';
  }
  else
  {
    echo '<div class="conteiner">';
	
	$page ="index" ;
	?>
	
		
	<?php
	
	session_start();
	
    echo "Bonjour <b>" .$_SESSION["_pseudo"]. "</b><br>";
	echo $_SESSION["_pseudo"];
	echo "Vous etes en mode de connection  <br /> et pouvez modifier les donn&eacute;es suivantes  : <br /> ";
    //echo "Vous êtes connecté  <br /> en temps que : <b>".safest($_SESSION["_rank"])."</b><br /> ";
    //if($_SESSION['_rank']=="root")
    //{
     // echo '<br><a href="index.php">Administration</a>';
    //}
	
	?>	
    <br/>
	<br/>
	<br/>
	****  partim  Gestion des dossiers  **** <a href="./1index.php">&nbsp;FM</a>
	
	<br/>
	

<br/>

 <a   href="gestion_new_client.php"><img class="cli4" src='../images/logo_dossiers_nouveau.png'>&nbsp;Introduction d'un nouveau client</a>
  &nbsp;&nbsp; &nbsp;&nbsp;    


<a href="./2015P3_modif_client.php?email=<?php echo $e_mail ;   ?>">&nbsp;Rechercher un client (mettre son email dans la barre de navigation)</a>

&nbsp;&nbsp


<a href="./2015_dossier1_client.php?id=<?php echo $id ;   ?>">&nbsp;Rechercher un client par N dossier</a>
 &nbsp;&nbsp;
<a   href="gestion_new_dossier.php">&nbsp;Introduction d'un nouveau dossier</a>
	<br/>


	<br/>
<br/>



<a   href="https://ssl14.ovh.net/~ecourtie/partenaire-formulaire-pret.php"><img class="cli4" src='..//membre/images_membre/demande_pret.jpg'>Nouveau client Pret</a>
 &nbsp;&nbsp;  &nbsp;&nbsp; 


<br/>

	
	<br/>

	



<a   href="gestion_new_client_assurances.php"><img class="cli4" src='..//membre/images_membre/demande_assurance.jpg'>&nbsp;Introduction d'un nouveau client Assurances</a>
 &nbsp;&nbsp; &nbsp;&nbsp; puis   &nbsp;&nbsp; &nbsp;&nbsp;



<a   href="gestion_clients_assurances.php">&nbsp;Gestion des clients Assurances</a>


  &nbsp;&nbsp; &nbsp;&nbsp;



<a   href="gestion_clients_epargne.php">&nbsp;Gestion des clients Epargne</a>


	<br/>	
	
	<br/><br/>
<br/>
		<a   href="gestion_dossier.php"><img class="cli4" src='../images/logo_dossiers_en_cours.png'>&nbsp;Gerer les dossiers clients</a>
		
		<br/>	
	
	<br/><br/>
<br/>
		<a   href="gestion_facturation.php"><img class="cli4" src='../images/logo_dossiers_en_cours.png'>&nbsp;Gerer les factures</a>
	
	<br/>
<br/>
<br/>
 <?php
//****** debut liste des dossiers en cours *********

session_start();


  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe where   id_partenaire ='$id_courant' AND id_apprteur ='$id_courant'  order by categorie");
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by categorie");
  
  
  $result_1 = mysql_query("SELECT * FROM dossiers_bkpe where (  statut = 'devis accepte' ) order by timekape_last_modif desc");
  
  
  
  //$result_1 = mysql_query("SELECT * FROM dossiers_bkpe order by categorie desc");
	$nbr_analyse=mysql_num_rows($result_1) ;
	if ($nbr_analyse> "0" ) 
	{
	echo "          <b>     Vous avez peut être un devis accept&eacute;! <br> CLIQUEZ SUR DEVIS ACCEPTES   </b>   
	         " ;
	}

?>	
	<a   href="gestion_devis_accepte.php"><img class="cli4" src='../images/logo_dossiers.png'>&nbsp;Gerer les devis accept&eacute;s</a>
  &nbsp;&nbsp; &nbsp;&nbsp;


<a   href="gestion_dossier_en_cours.php"><img class="cli4" src='../images/logo_dossiers.png'>&nbsp;Voir les contrats en cours</a>
  &nbsp;&nbsp; &nbsp;&nbsp;

<a   href="gestion_dossier_archiv_corb.php">&nbsp;Voir les dossiers archiv&eacute;s ou corbeille</a>
  &nbsp;&nbsp; &nbsp;&nbsp;
<a   href="gestion_dossier_refuse_finalise.php">&nbsp;Voir les dossiers refus&eacute;s ou finalis&eacute;s</a>
	
	<br/>
	<br/><br/>
	****  partim  administration g&eacute;n&eacute;rale  ****
	<br/>
	<br/>
	<a href="moi.php"><img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Changer le mot de passe</a>
	  &nbsp;&nbsp; &nbsp;&nbsp;
	<a href="deconnect.php">&nbsp;D&eacute;connexion</a>
	  &nbsp;&nbsp; &nbsp;&nbsp;
	<a href="../index.php">&nbsp;Retour au site public</a>
	<?php
    echo '</div>';
  }
session_start();

  //include('nouveau.php');
    
}

include('footer_fr.php');
?>