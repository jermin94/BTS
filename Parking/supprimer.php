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
		$reponse = $bdd->query('SELECT id_util, mail_util, mdp_util, valid_util, grade_util FROM utilisateur WHERE mail_util ="'.$identif.'"');
	
		while ($donnees = $reponse->fetch())
		{
			if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1)
			{
				echo'<p>Accees non autorisee</p>';
			}
				else if ($donnees['grade_util'] == 2)
				{
					include("./sidebar.php");
					echo '<div id="webcontainer">
							<h1>Suppression de compte</h1>';
					if (empty($_GET['p']))
					{
						echo '<p>Pas de compte selectionne.</p>';
					}
					else
					{
						$id_suppr=$_GET['p'];
						$reponse1 = $bdd->query('DELETE FROM utilisateur WHERE id_util ="'.$id_suppr.'"');
						$reponse1->CloseCursor();
						echo '<p>Utilisateur ', $id_suppr ,' bien supprimer </p>' ;
					}
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>