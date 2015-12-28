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
							<h1>Validation des Utilisateurs</h1>';
					$reponse->CloseCursor();
					$reponse = $bdd->query('SELECT id_util, nom_util, prenom_util, valid_util, grade_util FROM utilisateur WHERE valid_util = 0');
					
					echo '<table bgcolor="#FFFFFF">'."\n";
						echo '<tr>';
						echo '<td bgcolor="#669999"><b><u>Identifiant</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Validation</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Grade</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Valider</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Refuser</u></b></td>';
						echo '</tr>'."\n";
						
					while ($donnees = $reponse->fetch())
					{
						echo '<tr>';
						echo '<td bgcolor="#CCCCCC">'.$donnees['prenom_util'].' '.$donnees['nom_util'].'</td>';
						echo '<td bgcolor="#CCCCCC">'.$donnees['valid_util'].'</td>';
						echo '<td bgcolor="#CCCCCC">'.$donnees['grade_util'].'</td>';
						echo '<td bgcolor="#CCCCCC"><a href="./ajout.php?p='.$donnees['id_util'].'" target="_blank"><input type="submit" name="sup" value="Valider"></a></td>';
						echo '<td bgcolor="#CCCCCC"><a href="./supprimer.php?p='.$donnees['id_util'].'" target="_blank"><input type="submit" name="sup" value="Refuser"></a></td>';
						echo '</tr>'."\n";
						
    // fin du tableau.
					}
					echo '</table>'."\n";
					echo '</div>';
				}
				
		}
		$reponse->CloseCursor();
	
	}
?>
</body>
</html>