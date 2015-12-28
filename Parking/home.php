<!DOCTYPE html>
<html>
<head>
	<!-- PAGE -->
	<meta charset="utf-8"/>
	<title>Administration</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/body.css"/>
</head>
<body>
<?php
include("connexion.php");
session_start();

if (empty($_SESSION))
	{
		echo'<p>Accees non autorisee</p>';
	}
	else {
		$message='';
		$identif=$_SESSION['id'];
		$reponse = $bdd->query('SELECT id_util, mdp_util, valid_util, grade_util FROM utilisateur WHERE mail_util ="'.$identif.'"');
		
		while ($donnees = $reponse->fetch())
		{
			if ($_SESSION['level'] == 0)
			{
				echo'<p>Accees non autorisee</p>';
			}
				else
				{
					include("./sidebar.php");
				echo '<div id="webcontainer">
						<h1>Page d\'accueil de l\'administration</h1>
						
						<br/><br/>
						Bienvenue dans l\'administration du Parking de la M2L. <br/>
						<div id="center"><img src="css/parking.jpg"/></div>
				</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>