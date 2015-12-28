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
							<h1>Fin d\'autorisation de Parking</h1>';
					if (empty($_GET['p']))
					{
						echo '<p>Pas de place selectionne.</p>';
					}
					else
					{
							$id_place=$_GET['p'];
							$reponse1 = $bdd->query('SELECT id_place, id_util FROM place_occupe WHERE id_place = "'.$id_place.'"');
							if ($donnees = $reponse1->fetch())
							{
								$id_util=$donnees['id_util'];
								$reponse2 = $bdd->query('UPDATE parking SET dispo_place =1 WHERE id_place ="'.$id_place.'"');
								$reponse2->CloseCursor();
								$reponse3 = $bdd->query('DELETE FROM place_occupe WHERE id_place ="'.$id_place.'"');
								$reponse3->CloseCursor();
								$query=$bdd->prepare('INSERT INTO liste_attente (id_util, date_demande)  VALUES (:id_util, :date_demande)');
								$query->execute(array(
												'id_util' => $id_util,
												'date_demande' => date("YmdHis")));
								$query->CloseCursor();
								echo '<p>La place ', $id_place ,' a bien &eacute;t&eacute; lib&eacute;r&eacute;.</p>';
								echo'<p>Cliquez <a href="./supp-date.php">ici</a> pour revenir.</p>';
							}
							else
							{
								echo '<p>Probl&egrave;me lors de la suppression</p>';
								echo'<p>Cliquez <a href="./supp-date.php">ici</a> pour revenir.</p>';
							}
							
							$reponse1->CloseCursor();
					}
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>