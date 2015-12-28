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
							<h1>Gestion des places</h1>';
					$reponse1 = $bdd->query('SELECT * FROM parking');
					
					echo '<table bgcolor="#FFFFFF">'."\n";
						echo '<tr>';
						echo '<td bgcolor="#669999"><b><u>Place</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Disponibilite</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Supprimer</u></b></td>';
						echo '</tr>'."\n";
						
					while ($donnees = $reponse1->fetch())
					{
						echo '<tr>';
						echo '<td bgcolor="#CCCCCC">'.$donnees['id_place'].'</td>';
						echo '<td bgcolor="#CCCCCC">'.$donnees['dispo_place'].'</td>';
						echo '<td bgcolor="#CCCCCC"><a href="./supprimer-place.php?p='.$donnees['id_place'].'" target="_blank"><input type="submit" name="sup" value="Supprimer"></a></td>';
						echo '</tr>'."\n";
						
    // fin du tableau.
					}
					echo '</table>'."\n";
					$reponse1->CloseCursor();
					
					if(empty($_POST['id_place']))
					{
					echo '<div id="contenu">
						<div id="map">
							</div>
								<h1>Place de la M2L</h1>
								<p>Ajout de place au Parking de la M2L <br/>
								<form action="place.php" method="post" name="Ajouter">
									<fieldset><legend>Ajout de place</legend>
										<label for="id_place" class="float">Numero de la place :</label> <input type="text" name="id_place" id="id_place" size="30" /><br />
										<div class="center"><input type="submit" value="Ajouter" /></div>
									</fieldset>
								</form>
							</div>';
					}


					else
					{
						$i=0;
						$id_place=$_POST['id_place'];
						
						if ($i==0)
					   {
						echo'<h1>Ajout termin&#233;e</h1>';
							$query=$bdd->prepare('INSERT INTO parking  VALUES (:id_place, "1")');
							$query->execute(array(
											'id_place' => $id_place,
											));
							$query->CloseCursor();
							echo'<p>Cliquez <a href="./place.php">ici</a> pour recommencer</p>';
						}
						else
						{
							echo'<h1>Ajout interrompue</h1>';
							echo'<p>Cliquez <a href="./place.php">ici</a> pour recommencer</p>';
						}
					}
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>