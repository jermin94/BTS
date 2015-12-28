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
						<h1>Consultation de la liste d\'attente</h1>';
						$reponse1 = $bdd->query('SELECT * FROM liste_attente');
						$i=1;
						if ($donnees = $reponse1->fetch())
						{
							echo '<h3>Liste d\'attente</h3>';
							echo '<table bgcolor="#FFFFFF">'."\n";
							echo '<tr>';
							echo '<td bgcolor="#669999"><b><u>Num&#233;ro</u></b></td>';
							echo '<td bgcolor="#669999"><b><u>Nom de l\'utilisateur</u></b></td>';
							echo '<td bgcolor="#669999"><b><u>Attribuer une place</u></b></td>';
							echo '</tr>'."\n";
							$reponse2 = $bdd->query('SELECT * FROM liste_attente order by date_demande asc');
							while ($donnees = $reponse2->fetch())
							{
								echo '<tr>';
								echo '<td bgcolor="#CCCCCC">'.$i.'</td>';
								echo '<td bgcolor="#CCCCCC">'.$donnees['id_util'].'</td>';
								echo '<td bgcolor="#CCCCCC"><a href="./att-place.php?p='.$donnees['id_util'].'" target="_blank"><input type="submit" name="sup" value="Attribuer"></a></td>';
								echo '</tr>'."\n";
								$i=$i+1;
							}
							$reponse2->CloseCursor();
							echo '</table>'."\n";
						}
						else
						{
							echo '<p>Pas de liste d\'attente';
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