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
							$reponse1 = $bdd->query('SELECT id_place, id_util, fin_attrib FROM place_occupe WHERE fin_attrib <="'.date('Ymd').'"');
							if ($donnees = $reponse1->fetch())
							{
								echo '<table bgcolor="#FFFFFF">'."\n";
								echo '<tr>';
								echo '<td bgcolor="#669999"><b><u>Place</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Utilisateur</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Date de fin d\'attribution</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Supprimer</u></b></td>';
								echo '</tr>'."\n";
								$reponse2 = $bdd->query('SELECT id_place, id_util, fin_attrib FROM place_occupe WHERE fin_attrib <="'.date('Ymd').'"');
								while ($donnees = $reponse2->fetch())
								{
									echo '<tr>';
									echo '<td bgcolor="#CCCCCC">'.$donnees['id_place'].'</td>';
									echo '<td bgcolor="#CCCCCC">'.$donnees['id_util'].'</td>';
									echo '<td bgcolor="#CCCCCC">'.$donnees['fin_attrib'].'</td>';
									echo '<td bgcolor="#CCCCCC"><a href="./supp-date.php?p='.$donnees['id_place'].'" target="_blank"><input type="submit" name="sup" value="Supprimer"></a></td>';
									echo '</tr>'."\n";
								}
								$reponse2->CloseCursor();
								echo '</table>'."\n";
							}
							else
							{
								echo '<p>Pas de place à libere';
							}
							$reponse1->CloseCursor();
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>