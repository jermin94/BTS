<?php
define('MyPHPForum',true);

session_start();
include('mysql.php');
include('fonctions.php');
include("connexion.php");

$mdp_test = mysqlsafe($_POST['mdp']);
$pseudo_test = mysqlsafe($_POST['pseudo']);
//$requete = mysql_query("select * from table_5_user where mdp='$mdp_test' AND pseudo='$pseudo_test'");
$requete = mysql_query("select * from partenaires where reserve_1='$mdp_test' AND e_mail='$pseudo_test'");

$test = mysql_num_rows($requete);
if($test !=1)
{
  exit("<p>Pseudo et/ou mot de passe incorrect<br /><a href=\"./index.php\">retour</a></p>");
}
else
{

  $ligne = mysql_fetch_object($requete);
  $_pseudo = "$ligne->e_mail";
  $_mdp = "$ligne->reserve_1";
  $id = "$ligne->id";
  //$_rank = "$ligne->rank";
  //$_email = "$ligne->email";
  //$_id_p = "$ligne->id";
  
  $recherche = $bdd->query('SELECT * FROM partenaires WHERE e_mail ="'.$_pseudo.'"');
  $_SESSION['id'] = $donnees['id'];
  $recherche->CloseCursor();
  
  $_SESSION['_pseudo'] = $_pseudo;
  $_SESSION['_mdp'] = $_mdp;
  //$_SESSION["_rank"] = $_rank;
  //$_SESSION["_email"] = $_email;
  //$_SESSION["_id_p"] = $_id_p;
  //$_SESSION["_mbr_id"] = $_id_p;
  
  $expire = 365*24*3600;
  setcookie("myforum_login_guides1","$id",time()+$expire,"/","",0);
  setcookie("myforum_pass_guides1","$_pseudo",time()+$expire,"/","",0);
  
  header("location: ./index.php");
  exit();

}